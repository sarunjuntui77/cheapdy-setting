
$(document).ready(function() {
    $('.ui.radio.checkbox').checkbox();
    handleFormSubmit();
});

function handleFormSubmit() {
    $('#get-coupon-form').on('submit', (e)=> {
        e.preventDefault();
        $('getcoupons').addClass('hide');
        $('loading').removeClass('hide');
        const body = {
            coupon_email: $('#get-coupon-form input[name=email]').val(),
            coupon_name: $('#get-coupon-form input[name=name]').val(),
            coupon_phone: '',
            coupon_sex: $('#get-coupon-form input[name=sex]:checked').val(),
            promotion_number: promotionNumber,
            promotion_title: promotionTitle,
            promotion_desc: promotionDesc,
            provider_id: providerId,
            provider_name: providerName
        }
        $.ajax({
            url: BASE_URL+'api/coupons',
            data: body,
            type: 'POST',
            success: (data)=>{
                sussessFormSubmit(data);
            }
        })
    });
}

function sussessFormSubmit(data) {
    setTimeout(()=> {
        $('loading').addClass('hide');
        if (data === 'SUCCESS') {
            $('success').removeClass('hide');
        } else if (data === 'MAXQUOTA_EMAIL_DATE') {
            $('maxquotaemail').removeClass('hide');
        } else if (data === 'MAXQUOTA_EMAIL_PROMOTION') {
            $('maxquotaemail').removeClass('hide');
        } else if (data === 'MAXQUOTA_QTY') {
            $('maxquotaqty').removeClass('hide');
        } else if (data === 'ERROR') {
            $('success').removeClass('hide');
        } else {
            $('success').removeClass('hide');
        }
        $('iframe').css('height', '100px');
        console.log($('iframe'));
    }, 1000);
}