jQuery( document ).ready( function() {

    // contact form
    var contactname1 = jQuery('#name-contact-1');
    var contactemail = jQuery('#email-contact, input#email-contact');
    var contactmessage = jQuery('#message-contact');
    var contactsent1 = jQuery('#send-contact-1');
    //form failed succes var
    var successent = jQuery( "#mail_success" );
    var failedsent = jQuery( "#mail_failed" );
    // contact form
    jQuery(function() {
    contactsent1.on('click', function(e) {
    e.preventDefault();
    var e = contactname1.val(),
    a = contactemail.val(),
    s = contactmessage.val(),
    r = !1;
    if (0 == a.length || "-1" == a.indexOf("@") || "-1" == a.indexOf(".")) {
    var r = !0;
    contactemail.css({
    "border-bottom": "1px solid #dd4425"
    });
    } else contactemail.css({
    "border-bottom": "1px solid rgba(0,0,0,.3)"
    });
    if (0 == e.length) {
    var r = !0;
    contactname1.css({
    "border-bottom": "1px solid #dd4425"
    });
    } else contactname1.css({
    "border-bottom": "1px solid rgba(0,0,0,.3)"
    });
    if (0 == s.length) {
    var r = !0;
    contactmessage.css({
    "border-bottom": "1px solid #dd4425"
    });
    } else contactmessage.css({
    "border-bottom": "1px solid rgba(0,0,0,.3)"
    });
    return 0 == r && (contactsent1.attr({
    disabled: "true",
    value: "Sending..."
    }), $.ajax({
    type: "POST",
    url: "send.php",
    data: "name=" + e + "&email=" + a + "&subject=You Got Email&message=" + s,
    success: function(e) {
    "success" == e ? (successent.fadeIn(500)) : (failedsent.html(e).fadeIn(500), contactsent1.removeAttr("disabled").attr("value", "send").remove())
    }
    })), !1
    })
    }); 
			
 } );

/* Whatsapp Reservation */
var sendreserv = $("#sendreservation");
sendreserv.on('click', function(e) {
e.preventDefault();
var input_blanter = document.getElementById('wa_email');
var walink = 'https://web.whatsapp.com/send',
    phone = '6285811168972',
    walink2 = 'Dbento Reservation ',
    text_yes = 'Message sent',
    text_no = 'Please Fill Your Reservation';
/* Smartphone Support */
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
var walink = 'whatsapp://send';
}
if("" != input_blanter.value){
 /* Call Input Form */
var wa_guest = $("#wa_guest").val(),
    wa_name= $("#wa_name").val(),
    wa_email = $("#wa_email").val(),
    wa_phone= $("#wa_phone").val(),
    wa_date= $("#wa_date").val(),
    wa_time= $("#wa_time").val(),
    wa_message = $("#message-text").val();
/* Final Whatsapp URL */
var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
    '*Name* : ' + wa_name+ '%0A' +
    '*Email Address* : ' + wa_email + '%0A' +
    '*Number of Guest* : ' + wa_guest + '%0A' +
    '*Phone* : ' + wa_phone+ '%0A' +
    '*Date : ' + wa_date+ '%0A' +
    '*Time : ' + wa_time+ '%0A' +
    '*Description* : ' + wa_message + '%0A';
/* Whatsapp Window Open */
window.open(blanter_whatsapp,'_blank');
document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
sendreserv.addClass('disable');
} else {
document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
}
});