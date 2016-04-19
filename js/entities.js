/**
 @package   commande
 @author    Gilles Dubois, Valentin Deville
 @copyright Copyright (c) 2010-2015 FactorFX
 @license   AGPL License 3.0 or (at your option) any later version http://www.gnu.org/licenses/agpl-3.0-standalone.html
 @link      https://www.factorfx.com
 @since     2015

 --------------------------------------------------------------------------
 */
$(document).ajaxStop(function() {
    if(!$('#TabEnt').length){
        addSelectEntities();
    }
});
$(document).ready(function() {
    if(!$('#TabEnt').length){
        addSelectEntities();
    }
});

function addSelectEntities(){

    // Ticket regex
    var RegExTicket = /ticket\.form\.php/,
        RegexUrl = /^(.*)front\/.*\.form\.php/,
        RegexUrlRes = RegexUrl.exec(window.location.pathname);

    // Retrieve current url
    var url = window.location.href;

    if(url.match(RegExTicket)){

        var get_id = getParameterByName('id');

        if(get_id == ""){

            $.ajax({
                url : RegexUrlRes[1] + "plugins/selectentities/front/entities.php",
                type : 'GET',
                dataType : 'html',
                success : function(data){
                    $('#tabsbody').prepend(data);
                },
                error : function () {
                    $('#tabsbody').prepend('Error while retrieving data.');
                }

            });
        }
    } else { // Not in ticket form maybe in helpdesk (simplfied form ?)
        // Help desk regex
        var RegExHelpdesk = /helpdesk\.public\.php/,
            RegexUrl = /^(.*)front\/.*\.public\.php/,
            RegexUrlRes = RegexUrl.exec(window.location.pathname);

        var helpdesk = window.location.hostname + window.location.pathname;

        if(helpdesk.match(RegExHelpdesk)){

            var create_ticket = getParameterByName('create_ticket');

            if(create_ticket == 1){
                $.ajax({
                    url : RegexUrlRes[1] + "plugins/selectentities/front/entities.php",
                    type : 'GET',
                    dataType : 'html',
                    success : function(data){
                        $('form[name="helpdeskform"]').prepend(data);
                    },
                    error : function () {
                        $('form[name="helpdeskform"]').prepend('Error while retrieving data.');
                    }

                });

            }

        }

    }

}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function removeAndRefresh(){
    $('#GTR').remove();
    $('#TabContract').remove();
    var value = $("input[id^='dropdown_tabs_entities']").val();
    addGtrDropdown(value);
    addContractInfos(value);
}

