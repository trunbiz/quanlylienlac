function formatErrorMessage(jqXHR, exception) {
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found. [404]');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error [500].');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    } else {
        if (jqXHR.responseJSON.error != null && jqXHR.responseJSON.error != undefined) {
            return (jqXHR.responseJSON.error);
        } else {
            return ('Uncaught Error.\n' + jqXHR.responseText);
        }
    }
};

function setCookie(cname, cvalue, minutes) {
    var d = new Date();
    d.setTime(d.getTime() + (minutes * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

$.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}

$.urlParamsConfig = function (name) {
    var results = new RegExp(name).exec(window.location.href);
    if (results == null) {
        return null;
    }
    return decodeURI(results[1]) || 0;
}

function register_receive_email(id) {
    $(id == '.btnReceiveEmail' ? '.frmReceiveEmail' : '.frmBrandReceiveEmail').bootstrapValidator('validate');
    if ($(id == '.btnReceiveEmail' ? '.frmReceiveEmail' : '.frmBrandReceiveEmail').data('bootstrapValidator').isValid() == true) {
        var param = {
            'email': $.trim($(id == '.btnReceiveEmail' ? '#txtEmail' : '#txtBrandEmail').val()),
            'is_update_fashion': (id == '.btnReceiveEmail' ? 'Y' : 'N'),
            'brand_id': (id == '.btnReceiveEmail' ? '' : $('#txtBrandEmail').attr('key'))
        };
        var method = 'post';
        var url = siteUrl + '/registerreceiveemail';
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            data: $.param(param),
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    $('#txtEmail,#txtBrandEmail').val('');
                    $('.designer-info .collapse-toogle').removeClass('in');
                    $("body").removeClass("loading");
                    if (id == '.btnReceiveEmail') {
                        $(".box-label-alert-registerreviceemail").removeClass('hide');
                    } else {
                        $('.dlg-notify').modal({
                            'keyboard': true,
                            'show': true
                        });
                        $('.dlg-notify .modal-title').html('THÔNG BÁO NHẬN BẢN TIN');
                        /*$('.dlg .modal-body').html('Bạn vừa đăng ký cập nhật xu hướng thời trang và các ưu đãi đặc biệt thành công!');*/
                        $('.dlg-notify .modal-body').html('<br><b>Quý khách đã đăng ký nhận bản tin từ RENDER thành công. Nếu muốn thay đổi các thông tin nhận qua email đã đăng ký, Quý khách vui lòng Đăng ký tài khoản với RENDER và lựa chọn các thông tin muốn nhận. <br><br><br> <i>RENDER XIN CHÂN THÀNH CẢM ƠN QUÝ KHÁCH! </i></b> <br><br>');
                    }
                    var email = param.email;

                    /*var mergeVars = {
                        groupings: [{
                            name: "User Type",
                            groups: ["API Integration"]
                        }]
                    }

                    ematics("subscribe", "a609eb301e", email, mergeVars, function (e) {
                        if (e["error"] == 0) {
                            // Success
                        } else {
                            // Error
                            // console.log(e["errorMessage"])
                        }
                    });*/

					var mergeVars = {
						"COUPON": data['code']
					};
					ematics("subscribe","", email, mergeVars, function(e){
						if (e["error"] == 0) {
							// Success
						} else {
							// Error
							// console.log(e["errorMessage"])
						}
					});

                } else {
                    $("body").removeClass("loading");
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                    $('.dlg-notify').modal({
                        'keyboard': true,
                        'show': true
                    });
                    //showAlert("#dlgAddnew .alert",true,'Lỗi!',data['error']);
                }
            },
            error: function (xhr, err) {
                //alert(formatErrorMessage(xhr, err));
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
                $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
                //showAlert("#dlgAddnew .alert",true,'Lỗi!',formatErrorMessage(xhr, err));
            }
        });
    }
};

function register_email(id) {
    $(id == '.btnEmail' ? '.frmEmail' : '.frmBrandReceiveEmail').bootstrapValidator('validate');
    if ($(id == '.btnEmail' ? '.frmEmail' : '.frmBrandReceiveEmail').data('bootstrapValidator').isValid() == true) {
        var param = {
            'email': $.trim($(id == '.btnEmail' ? '#txEmail' : '#txtBrandEmail').val()),
            'is_update_fashion': (id == '.btnEmail' ? 'Y' : 'N'),
            'brand_id': (id == '.btnEmail' ? '' : $('#txtBrandEmail').attr('key'))
        };
        var method = 'post';
        var url = siteUrl + '/registerreceiveemail';
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            data: $.param(param),
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    $('#txEmail,#txtBrandEmail').val('');
                    $('.designer-info .collapse-toogle').removeClass('in');
                    $("body").removeClass("loading");
                    if (id == '.btnEmail') {
                        $(".divright .text-center").html('Xác nhận đăng ký thành công. Cảm ơn bạn đã để lại thông tin, các chương trình mới nhất sẽ được RENDER cập nhập trong thời gian tới!');
                        $(".box-label-alert-registeremail").removeClass('hide');
                    } else {
                        $('.dlg-notify').modal({
                            'keyboard': true,
                            'show': true
                        });
                        $('.dlg-notify .modal-title').html('THÔNG BÁO NHẬN BẢN TIN');
                        /*$('.dlg .modal-body').html('Bạn vừa đăng ký cập nhật xu hướng thời trang và các ưu đãi đặc biệt thành công!');*/
                        $('.dlg-notify .modal-body').html('<br><b>Quý khách đã đăng ký nhận bản tin từ RENDER thành công. Nếu muốn thay đổi các thông tin nhận qua email đã đăng ký, Quý khách vui lòng Đăng ký tài khoản với RENDER và lựa chọn các thông tin muốn nhận. <br><br><br> <i>RENDER XIN CHÂN THÀNH CẢM ƠN QUÝ KHÁCH! </i></b> <br><br>');
                    }
                    var email = param.email;

                    /*var mergeVars = {
                        groupings: [{
                            name: "User Type",
                            groups: ["API Integration"]
                        }]
                    }

                    ematics("subscribe", "a609eb301e", email, mergeVars, function (e) {
                        if (e["error"] == 0) {
                            // Success
                        } else {
                            // Error
                            // console.log(e["errorMessage"])
                        }
                    });*/

					var mergeVars = {
						"COUPON":""
					};
					ematics("subscribe","", email, mergeVars, function(e){
						if (e["error"] == 0) {
							// Success
						} else {
							// Error
							// console.log(e["errorMessage"])
						}
					});

                } else {
                    $("body").removeClass("loading");
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                    $('.dlg-notify').modal({
                        'keyboard': true,
                        'show': true
                    });
                    //showAlert("#dlgAddnew .alert",true,'Lỗi!',data['error']);
                }
            },
            error: function (xhr, err) {
                //alert(formatErrorMessage(xhr, err));
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
                $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
                //showAlert("#dlgAddnew .alert",true,'Lỗi!',formatErrorMessage(xhr, err));
            }
        });
    }
}

function registervalidator() {
    $('#frmregister').bootstrapValidator({
            fields: {
                fullname: {
                    validators: {
                        notEmpty: {
                            message: 'Họ tên bắt buộc phải nhập'
                        }
                    }
                },
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Địa chỉ bắt buộc phải nhập'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Mật khẩu bắt buộc phải nhập'
                        }
                    }
                },
                password_confirm: {
                    validators: {
                        notEmpty: {
                            message: 'Xác nhận mật khẩu bắt buộc phải nhập'
                        }
                    }
                },
                birthday: {
                    validators: {
                        notEmpty: {
                            message: 'Ngày sinh bắt buộc phải nhập'
                        }
                    }
                },
                province_id: {
                    validators: {
                        notEmpty: {
                            message: 'Thành phố bắt buộc phải chọn'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Số điện thoại bắt buộc phải nhập'
                        },
                        regexp: {
                            regexp: /^0[1-9]{1}[0-9]{8,9}$/,
                            message: 'Số điện thoại không đúng định dạng'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Hòm thư bắt buộc phải nhập'
                        },
                        regexp: {
                            regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                            message: 'Định dạng hòm thư không đúng'
                        }
                    }
                },
            },
            live: 'disabled'
        }).on('err.field.fv', function (e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        })
        .on('success.field.fv', function (e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        });
};

function registercooperationvalidator() {
    $('#frmregistercooperation').bootstrapValidator({
            fields: {
                user_name: {
                    validators: {
                        notEmpty: {
                            message: 'Tên người liên hệ bắt buộc phải nhập'
                        }
                    }
                },
                brand_name: {
                    validators: {
                        notEmpty: {
                            message: 'Tên thương hiệu bắt buộc phải nhập'
                        }
                    }
                },
                design_style: {
                    validators: {
                        notEmpty: {
                            message: 'Phong cách thiết kế bắt buộc phải nhập'
                        }
                    }
                },
                business_products: {
                    validators: {
                        notEmpty: {
                            message: 'Sản phẩm kinh doanh bắt buộc phải chọn'
                        }
                    }
                },
                product_price: {
                    validators: {
                        notEmpty: {
                            message: 'Giá sản phẩm bắt buộc phải chọn'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Số điện thoại bắt buộc phải nhập'
                        },
                        regexp: {
                            regexp: /^0[1-9]{1}[0-9]{8,9}$/,
                            message: 'Số điện thoại không đúng định dạng'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Hòm thư bắt buộc phải nhập'
                        },
                        regexp: {
                            regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                            message: 'Định dạng hòm thư không đúng'
                        }
                    }
                },
            },
            live: 'disabled'
        }).on('err.field.fv', function (e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        })
        .on('success.field.fv', function (e, data) {
            if (data.fv.getSubmitButton()) {
                data.fv.disableSubmitButtons(false);
            }
        });
};

function purchasenotaccount() {
    $('#frmpurchasenotaccount').bootstrapValidator({
		fields: {
			email: {
				validators: {
					notEmpty: {
						message: 'Hòm thư bắt buộc phải nhập'
					},
					regexp: {
						regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
						message: 'Định dạng hòm thư không đúng'
					}
				}
			},
			fullname: {
				validators: {
					notEmpty: {
						message: 'Họ tên bắt buộc phải nhập'
					}
				}
			},
			address: {
				validators: {
					notEmpty: {
						message: 'Địa chỉ bắt buộc phải nhập'
					}
				}
			},
			province_id: {
				validators: {
					notEmpty: {
						message: 'Thành phố bắt buộc phải chọn'
					}
				}
			},
			district_id: {
				validators: {
					notEmpty: {
						message: 'Quận/Huyện bắt buộc phải chọn'
					}
				}
			},
			phone: {
				validators: {
					callback: {
						callback: function (value, validator, $field) {
							$('#txtPhone').val(value.trim());
							return true;
						}
					},
					notEmpty: {
						message: 'Số điện thoại bắt buộc phải nhập'
					},
					regexp: {
						regexp: /^0[1-9]{1}[0-9]{8,9}$/,
						message: 'Số điện thoại không đúng định dạng'
					}
				}
			}
		},
		live: 'disabled'
	}).on('err.field.fv', function (e, data) {
		if (data.fv.getSubmitButton()) {
			data.fv.disableSubmitButtons(false);
		}
	})
	.on('success.field.fv', function (e, data) {

		if (data.fv.getSubmitButton()) {
			data.fv.disableSubmitButtons(false);
		}
	});
};

function validator() {
    $('.frmReceiveEmail').bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Hòm thư bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                        message: 'Định dạng hòm thư không đúng'
                    }
                }
            },
        },
        live: 'disabled'
    });
};

function frmvalidator() {
    $('.frmEmail').bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Vui lòng bạn nhập email hoặc số điện thoại'
                    }
                }
            },
        },
        live: 'disabled'
    });
};

function validatorReceiveVoucher() {
    $('.frmReceiveVoucher').bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Hòm thư bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                        message: 'Định dạng hòm thư không đúng'
                    }
                }
            },
        },
        live: 'disabled'
    });
};

function giftcardvalidator() {
    $('#frmgiftcard').bootstrapValidator({
        fields: {
            recipient_email: {
                validators: {
                    notEmpty: {
                        message: 'Email người tiếp nhận bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                        message: 'Định dạng hòm thư không đúng'
                    }
                }
            },
            confirmemail: {
                validators: {
                    notEmpty: {
                        message: 'Xác nhận email bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                        message: 'Định dạng hòm thư không đúng'
                    }
                }
            },
        },
        live: 'disabled'
    });
}

function designvalidator() {
    $('.frmBrandReceiveEmail').bootstrapValidator({
        fields: {
            designeremail: {
                validators: {
                    notEmpty: {
                        message: 'Hòm thư bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,
                        message: 'Định dạng hòm thư không đúng'
                    }
                }
            },
        },
        live: 'disabled'
    });
};

function paymentaddressvalidator() {
    $('#frmPaymentAddress').bootstrapValidator({
        fields: {
            billing_fullname: {
                validators: {
                    notEmpty: {
                        message: 'Họ tên bắt buộc phải nhập'
                    }
                }
            },
            billing_address: {
                validators: {
                    notEmpty: {
                        message: 'Địa chỉ bắt buộc phải nhập'
                    }
                }
            },
            billing_province_id: {
                validators: {
                    notEmpty: {
                        message: 'Thành phố bắt buộc phải chọn'
                    }
                }
            },
            billing_phone: {
                validators: {
                    notEmpty: {
                        message: 'Số điện thoại bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /^0[1-9]{1}[0-9]{8,9}$/,
                        message: 'Số điện thoại không đúng định dạng'
                    }
                }
            },
            shipping_fullname: {
                validators: {
                    notEmpty: {
                        message: 'Họ tên bắt buộc phải nhập'
                    }
                }
            },
            shipping_address: {
                validators: {
                    notEmpty: {
                        message: 'Địa chỉ bắt buộc phải nhập'
                    }
                }
            },
            shipping_province_id: {
                validators: {
                    notEmpty: {
                        message: 'Thành phố bắt buộc phải chọn'
                    }
                }
            },
            shipping_phone: {
                validators: {
                    notEmpty: {
                        message: 'Số điện thoại bắt buộc phải nhập'
                    },
                    regexp: {
                        regexp: /^0[1-9]{1}[0-9]{8,9}$/,
                        message: 'Số điện thoại không đúng định dạng'
                    }
                }
            },
			province_id: {
                validators: {
                    notEmpty: {
                        message: 'Thành phố bắt buộc phải chọn'
                    }
                }
            },
			district_id: {
                validators: {
                    notEmpty: {
                        message: 'Quận/Huyện bắt buộc phải chọn'
                    }
                }
            },
        },
        live: 'disabled'
    });
};

function caculatorgrandamount() {
    if ($('.grandamount').length) {
        var subtotal = parseFloat($('.subtotal').attr('subtotal'));
        subtotal += parseFloat($('.optfeeship:checked').val());
        subtotal += parseFloat($('.optgiftcard:checked').val());

        $('#feeship').number(parseFloat($('.optfeeship:checked').val()), 0, ',', '.');
        $('#giftcardprice').number(parseFloat($('.optgiftcard:checked').val()), 0, ',', '.');
        $('.grandamount').number(parseFloat(subtotal, 0, ',', '.'));
        $('#feeship').html($('#feeship').html() + ' VND');
        $('#giftcardprice').html($('#giftcardprice').html() + ' VND');
        $('.grandamount').html($('.grandamount').html() + ' VND');
    }
}

function changegiftcardprice() {
    $('#giftcard_id').val($('#slcprice').val());
}

function convertNumber(price){
	var price = price.split(",");
	return Number(parseFloat(price[0]).toFixed(1)).toLocaleString() + ' ~ ' + Number(parseFloat(price[1]).toFixed(1)).toLocaleString();
}

var frontEnd =
{
	removeFilter: function(object, type, attr){
		switch(type){
			case 'prices':
				$('#'+attr).val('0,60000000');
				$('#'+attr).attr('value', '0,60000000');
				$('#'+attr).attr('data-value', '0,60000000');
				$('#'+attr).attr('data-slider-value', '0,60000000');
				$('#lblPrice').html(convertNumber('0,60000000') + ' VND');
				filter(false, true);
				break;
			case 'types':
				if($('['+attr+']').closest('a').length){
					$('['+attr+']').removeClass('active');
					$('['+attr+']').parent().find('.checkbox').removeClass('checked');
					$('['+attr+']').parent().find('ul').addClass('hide');
				} else {
					$('['+attr+']').removeClass('checked');
				}
				filter(false, true);
				break;
			case 'designers':
				$('['+attr+']').removeClass('checked');
				filter(false, true);
				break;
			case 'sizes':
				$('['+attr+']').removeClass('checked');
				filter(false, true);
				break;
		}
	},
	closeFilterMobile: function(){
		$('.product-designer ul').slimScroll({
            destroy: true
        });
		$('#product-designer-ul').attr('style', 'max-height: calc(100vh - 250px); overflow: auto;');
		$('.product-designer').find('.slimScrollBar').remove();
		$('.product-designer').find('.slimScrollRail').remove();

		$('.product-designer ul').slimScroll({
		   size: '5px',
		   height: 'calc(100vh - 161px)',
		   alwaysVisible: false,
		   touchScrollStep: 50
		});


		$('.filter-tab-content').toggleClass('tab-content');
		$('.filter-tab-content>div').toggleClass('tab-pane fade');
		$('.prod-list-filter li').first().toggleClass('active');
		$('.filter-tab-content>div').first().toggleClass('in active');
		$('.prod-list-filter').toggleClass('show-filter');
		$('body').toggleClass('open-filter');
		$('.box-filter-client').toggleClass('hide');
	},
	crashFilterMobile: function(){
		$('.product-designer ul').slimScroll({
            destroy: true
        });
		$('#product-designer-ul').attr('style', 'max-height: calc(100vh - 250px); overflow: auto;');
		$('.product-designer').find('.slimScrollBar').remove();
		$('.product-designer').find('.slimScrollRail').remove();

		$('.product-designer ul').slimScroll({
            alwaysVisible: true,
            railVisible: true,
            height: 255
        });


		$('.filter-tab-content').removeClass('tab-content');
		$('.filter-tab-content>div').removeClass('tab-pane fade');
		$('.prod-list-filter li').removeClass('active');
		$('.filter-tab-content>div').removeClass('in active');
		$('.prod-list-filter').removeClass('show-filter');
		$('body').removeClass('open-filter');
		$('.box-filter-client').addClass('hide');
	},
	filterDesigner: function(){
		// Declare variables
		var input, filter, ul, li, a, i, txtValue;
		input = document.getElementById('txtSearchDesinger');
		filter = input.value.toUpperCase();
		ul = document.getElementById("product-designer-ul");
		li = $('#product-designer-ul').find('li > div > span');
		// Loop through all list items, and hide those who don't match the search query
		for (i = 0; i < li.length; i++) {
			a = li[i];
			txtValue = a.textContent || a.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				li[i].parentElement.parentElement.style.display = "";
			} else {
				li[i].parentElement.parentElement.style.display = "none";
			}
		}
	},
	ematicPush: function(params,type){
		/*try{
			var products = [];
			$.each(params, function( key, value) {
				products.push({
					id: value['product_id'], //bắt buộc
					categoryId: 0,
					transactionId: 0,
					price: parseFloat(value['price']).toFixed(2), // bắt buộc
					priceNumber: parseFloat(value['price']).toFixed(2),// bắt buộc
					priceCurrency: "VND", // bắt buộc
					misc1: 0, // Nếu có
					misc2: 0, // Nếu có
					quantity: value['quantity'], // bắt buộc
					name: value['product_name'], // bắt buộc
					brandName: value['brand_name'], // bắt buộc
					desc: value['category_name'],
					imageUrl: value['image'], // bắt buộc
					link: "https://RENDER.vn/san-pham/"+value['alias']+".html" // bắt buộc
				});
			});
			//console.log(products);
			ematics("log", "product", "cart", products);
		} catch (error) { console.log('ERROR PUSH EMATIC'); } */
	}
}

var provinceId = 0;
var districtId = 0;
function filter(returnParam = false, ajax_request = false, show_filter=false) {
    var params = new Array();
    if ($.trim($('#order').val()) != '') {
        params.push('order=' + $('#order option:selected').attr('field'));
        params.push('dir=' + $('#order').val());
    }
    //if($('.record-number.active').length>0 && $('.record-number.active').index() > 1)
    if ($('.record-number.active').length > 0) {
        params.push('limit=' + $('.record-number.active').text());
    }
    //if($('.product-type li a.active').length > 0)
    //{
    //params.push('types=' +$('.product-type li a.active').attr('type-id'));
    //}
    var types = new Array();
    if ($('.product-type li .checkbox.checked').length > 0 || $('.product-type li a.active').length > 0) {
        $('.product-type li .checkbox.checked').each(function () {
            types.push($(this).attr('type-id'));
        });
        types.push($('.product-type li a.active').attr('type-id'));
        params.push('types=' + types.reverse().join(','));
    }
    if (types.length < 1 && $.urlParam('types') != null && $('.product-type li').length <= 0) {
        params.push('types=' + $.urlParam('types'));
    }
    var options = new Array();
    //if (types.length < 1 && $.urlParam('options') != null) {
    //    params.push('option=' + $.urlParam('options'));
    //}
	if ($.urlParam('option') != null) {
        params.push('option=' + $.urlParam('option'));
    }
	if ($.urlParam('sale') != null) {
        params.push('sale=' + $.urlParam('sale'));
    }
	if ($.urlParam('prices') != null && typeof $('#txtPrice').val() === "undefined") {
        params.push('prices=' + $.urlParam('prices'));
    }
    if ($('.product-style li a.active').length > 0) {
        params.push('styles=' + $('.product-style li a.active').attr('style-id'));
    } else if ($.trim($('#txtStyle').val()) != '' && $('#txtStyle').val() != undefined && $('#txtStyle').val() != null) {
        params.push('styles=' + $('#txtStyle').val());
    }
    if ($('.product-designer li .checkbox.checked').length > 0) {
        var designer = new Array();
        $('.product-designer li .checkbox.checked').each(function () {
            designer.push($(this).attr('designer-id'))
        });
        params.push('designers=' + designer.join(','));
    }
    if ($('.product-size li .checkbox.checked').length > 0) {
        var size = new Array();
        $('.product-size li .checkbox.checked').each(function () {
            size.push($(this).attr('size-id'))
        });
        params.push('sizes=' + size.join(','));
    }
    if ($('#tag-filter span.active').length > 0) {
        params.push('tag=' + $('#tag-filter span.active').data('tag'));
    }
    if ($('.btnflashsaleslot.active').length > 0) {
        params.push('landing_slot_id=' + $('.btnflashsaleslot.active').data('id'));
    }
    /*if($('#txtPrice').val() !='0,10000000' )
    {*/
    //if(flgPriceSearch)
    //{
    if ($('#txtPrice').length) {
        params.push('prices=' + $('#txtPrice').val());
    }
    //}
    //}
    if ($('.product-sale li a.active').length > 0) {
        params.push('sale=1');
    }
    if ($.urlParam('keywords') != null) {
        params.push('keywords=' + $.urlParam('keywords'));
    }
	if(show_filter){
		showFilter(params);
	} else {
		if (returnParam) {
			return params;
		} else {
			if(ajax_request) {
				filterDataAjax(params, route);
			} else {
				if (params.length > 0) {
					location.href = route + '?' + params.join('&');
				} else {
					location.href = route;
				}
			}
		}
	}
};

function showFilter(params){
	/*console.log("****************");
	console.log(params);
	console.log("****************");*/

	/* push filtered */
	var list_filter = '';
	var filter_show = ['sizes', 'prices', 'designers', 'types'];
	$.each(params, function( key, value) {
		value = value.split('=');
		var variable = value[0];
		var variableData = value[1];
		if(filter_show.includes(variable)){
			switch(variable){
				case 'prices':
					if(variableData != '0,60000000' && variableData != ''){
						list_filter += '<span class="filter-item" onclick="frontEnd.removeFilter($(this), \'prices\', \'txtPrice\')">'+convertNumber(variableData)+' VND</span>';
					}
					break;
				case 'types':
					list_types = variableData.split(',');
					$.each(list_types, function( tkey, tvalue) {
						if(tvalue){
							tName = $('[type-id='+tvalue+']').html();
							list_filter += '<span class="filter-item" onclick="frontEnd.removeFilter($(this), \'types\', \'type-id='+tvalue+'\')">'+tName+'</span>';
						}
					});
					break;
				case 'designers':
					list_designers = variableData.split(',');
					$.each(list_designers, function( dkey, dvalue) {
						if(dvalue){
							dName = $('[designer-id='+dvalue+'] > span').html();
							list_filter += '<span class="filter-item" onclick="frontEnd.removeFilter($(this), \'designers\', \'designer-id='+dvalue+'\')">'+dName+'</span>';
						}
					});
					break;
				case 'sizes':
					list_sizes = variableData.split(',');
					$.each(list_sizes, function( skey, svalue) {
						if(svalue){
							sName = $('[size-id='+svalue+'] > span').html();
							list_filter += '<span class="filter-item" onclick="frontEnd.removeFilter($(this), \'sizes\', \'size-id='+svalue+'\')">'+sName+'</span>';
						}
					});
					break;
			}
		}
	});

	//-- append filter
	if(list_filter){
		$('#filter-lists').html(list_filter);
		$('#filter-lists').show();
	} else {
		$('#filter-lists').html('');
		$('#filter-lists').hide();
	}
}

function filterDataAjax(params, route){
	frontEnd.crashFilterMobile();

	console.log("****************");
	console.log(params);
	console.log("****************");

	showFilter(params);

	if (params.length > 0) {
		new_url = route + '?' + params.join('&');
	} else {
		new_url = route;
	}
	window.history.pushState("data","Title",new_url);
	params.push('routeid=' + $('#txtRouteId').val());
	params.push('designerid=' + $('#txtDesignerId').val());
	params.push('collectionid=' + $('#txtCollectionId').val());
	params.push('page=1');
	var method = 'get';
	var url = siteUrl + '/api/products?' + params.join('&');
	$("body").addClass("loading");
	$.ajax({
		url: url,
		type: method,
		cache: false,
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'json',
		success: function (data) {
			if(data.code){
				$("#list-product-ajax").html(data.html);
				$("#total_items").html(data.total_items);
				$("#pagging-ajax").html(data.pagination);
				$("#pagging-ajax-2").html(data.pagination);

				$("#list-product-ajax img.lazyload").lazyload({
					effect : "fadeIn"
				});

				var new_position = $('.home-content-area').offset();
				$('html, body').stop().animate({ scrollTop: new_position.top }, 500);

				$("body").removeClass("loading");
			}
		},
		error: function (xhr, err) {
			$("body").removeClass("loading");
		}
	});
}

var paramcnt = 0;

function addtowishlist(param) {
    var method = 'post';
    param.url = window.location.href;
    var url = siteUrl + '/api/addtowishlist';
    $("body").addClass("loading");
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(param),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                $("body").removeClass("loading");

                if (data['wish_qty'] > 0) {
                    $(".prod-wish-qty").html('(' + data['wish_qty'] + ')');
                    $("#lstwishlist .sub").remove();
                    $("#lstwishlist").append(data['content']);
                } else if (data['wish_qty'] == 0) {
                    $(".prod-wish-qty").html('');
                    $("#lstwishlist .sub").remove();
                    $("#lstwishlist").append("");
                }
                $("html, body").animate({
                    scrollTop: 0
                }, "slow", "linear", function () {
                    $('#lstwishlist .sub').slideDown("slow", function () {
                        /*setTimeout(function(){
                            $('#lstwishlist .sub').slideUp("slow",function(){
                                $('#lstwishlist .sub').removeAttr('style');
                            });
                        },3000);*/
                    });
                });
                $('.btntooltip .close').click(function () {
                    $(this).parents('.sub').slideUp("slow");
                });
                /*$('.dlg-notify').modal({'keyboard':true,'show':true});
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('Đã thêm vào wishlist thành công!');
                setTimeout(function()
                {
                    location.reload();
                },1000);*/
            } else if (data['login-url']) {
                $("body").removeClass("loading");
                location.href = data['login-url'];
            } else {
                $("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
            }
        },
        error: function (xhr, err) {
            $("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
        }
    });
};

function addprodtocart(param) {
    if (typeof fbq !== 'undefined' &&
        typeof product_fbq !== 'undefined') {
        fbq('track', 'AddToCart', {
            value: parseFloat(product_fbq.price),
            currency: 'VND',
            content_ids: product_fbq.code,
            content_type: 'product',
        });
    }

    var method = 'post';
    var url = siteUrl + '/api/addtocart';
    $("body").addClass("loading");
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(param),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                $("body").removeClass("loading");
                $("#lstitems .sub").remove();
                $("#lstitems").append(data['content']);
                if (data['cart_qty'] > 0) {
                    $(".prod-cart-qty").html('(' + data['cart_qty'] + ')');
                } else {
                    $(".prod-cart-qty").html('');
                }
                dataLayer.push({
                    "event": "addToCart",
                    "ecommerce": {
                        "currencyCode": "VND",
                        "add": {
                            "products": [data['product']]
                        }
                    }
                });
				//-- ematic push
				frontEnd.ematicPush(data['items'], 'cart');
				//-- end ematic
                $("html, body").animate({
                    scrollTop: 0
                }, "slow", "linear", function () {
                    $('#lstitems .sub').slideDown("slow", function () {
                        /*setTimeout(function(){
                            $('#lstitems .sub').slideUp("slow",function(){
                                $('#lstitems .sub').removeAttr('style');
                            });
                        },3000);*/
                    });
                });
                $('.btntooltip .close').click(function () {
                    $(this).parents('.sub').slideUp("slow");
                });
                /*$('.dlg-notify').modal({'keyboard':true,'show':true});
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('Đã thêm vào giỏ hàng thành công!');
                setTimeout(function()
                {
                    location.reload();
                },1000);*/
            }
            /*else if(data['login-url'])
            {
               $("body").removeClass("loading");
               location.href = data['login-url'];
            }*/
            else {
                $("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
            }
        },
        error: function (xhr, err) {
            $("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
        }
    });
};

function addprodstowishlist(params, indx) {
    var method = 'post';
    var url = siteUrl + '/api/addtowishlist';
    params[indx].url = window.location.href;
    $("body").addClass("loading");
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(params[indx]),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                $("body").removeClass("loading");

                if (data['wish_qty'] > 0) {
                    $(".prod-wish-qty").html('(' + data['wish_qty'] + ')');
                    $("#lstwishlist .sub").remove();
                    $("#lstwishlist").append(data['content']);
                } else if (data['wish_qty'] == 0) {
                    $(".prod-wish-qty").html('');
                    $("#lstwishlist .sub").remove();
                    $("#lstwishlist").append("");
                }
                $("html, body").animate({
                    scrollTop: 0
                }, "slow", "linear", function () {
                    $('#lstwishlist .sub').slideDown("slow", function () {
                        /*setTimeout(function(){
                            $('#lstwishlist .sub').slideUp("slow",function(){
                                $('#lstwishlist .sub').removeAttr('style');
                            });
                        },3000);*/
                    });
                });
                $('.btntooltip .close').click(function () {
                    $(this).parents('.sub').slideUp("slow");
                });
            } else if (data['login-url']) {
                $("body").removeClass("loading");
                location.href = data['login-url'];
            } else {
                $("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
            }
        },
        error: function (xhr, err) {
            $("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
        },
        complete: function () {
            paramcnt++;
            if (paramcnt < params.length) {
                addprodstowishlist(params, paramcnt);
            }
        }
    });
};

function addprodstocart(params, indx) {
    if (typeof fbq !== 'undefined' &&
        typeof product_fbq !== 'undefined') {
        fbq('track', 'AddToCart', {
            value: product_fbq.price,
            currency: 'VND',
            content_ids: product_fbq.code,
            content_type: 'product',
        });
    }
    var method = 'post';
    var url = siteUrl + '/api/addtocart';
    $("body").addClass("loading");
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(params[indx]),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                $("body").removeClass("loading");
                $("#lstitems .sub").remove();
                $("#lstitems").append(data['content']);
                if (data['cart_qty'] > 0) {
                    $(".prod-cart-qty").html('(' + data['cart_qty'] + ')');
                } else {
                    $(".prod-cart-qty").html('');
                }
                dataLayer.push({
                    "event": "addToCart",
                    "ecommerce": {
                        "currencyCode": "VND",
                        "add": {
                            "products": [data['product']]
                        }
                    }
                });
				//-- ematic push
				frontEnd.ematicPush(data['items'], 'cart');
				//-- end ematic
                $("html, body").animate({
                    scrollTop: 0
                }, "slow", "linear", function () {
                    $('#lstitems .sub').slideDown("slow", function () {
                        /*setTimeout(function(){
                            $('#lstitems .sub').slideUp("slow",function(){
                                $('#lstitems .sub').removeAttr('style');
                            });
                        },3000);*/
                    });
                });
                $('.btntooltip .close').click(function () {
                    $(this).parents('.sub').slideUp("slow");
                });
                /*$('.dlg-notify').modal({'keyboard':true,'show':true});
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('Đã thêm vào giỏ hàng thành công!');
                setTimeout(function()
                {
                    location.reload();
                },1000);*/
            }
            /*else if(data['login-url'])
            {
               $("body").removeClass("loading");
               location.href = data['login-url'];
            }*/
            else {
                $("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
            }
        },
        error: function (xhr, err) {
            $("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
        },
        complete: function () {
            paramcnt++;
            if (paramcnt < params.length) {
                addprodstocart(params, paramcnt);
            }
        }
    });
};

function updatecart(param, element, reload = true, fncCallbackFail = function(){}) {
    var method = 'post';
    var url = siteUrl + '/api/updatecart';
    //$("body").addClass("loading");
    paymenttype = {
        "paymenttype": $("#paymenttype").val()
    };
    Object.assign(param, paymenttype);
    $(element).parents('.collapse-toogle').find('.validator').text("").addClass('black').addClass('hide');

    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(param),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                //$("body").removeClass("loading");
                $("#lstitems .sub").remove();
                $("#lstitems").append(data['content']);
                if (data['cart_qty'] > 0) {
                    $(".prod-cart-qty").html('(' + data['cart_qty'] + ')');
                } else {
                    $(".prod-cart-qty").html('');
                }
                if ($(element).id != 'shipping_province_id') {
                    $(element).parents('.product-info-custom').find('.pricetotal').text(data['pricetotal']);
                    $(element).parents('tr').children('.pricetotal').text(data['pricetotal']);
                    $('.subtotal').text(data['subtotal']);
                }
                if (element.id == 'btnApplyCouponCode') {
                    $(element).parents('.collapse-toogle').find('.validator').addClass('hide');
                    $(element).parents('.collapse-toogle').find('.validator').text("Mã khuyến mại nhập thành công").addClass('black').removeClass('hide');
                }
                $('#feeship').text(data['shipping_amount']);
                if (data['discount_amount'] != '') {
                    $('.divpromotion').removeClass('hide');
                    $('.discountamount').text(data['discount_amount']);
                } else {
                    $('.divpromotion').addClass('hide');
                }
                $('.grandamount').text(data['grand_total']);
                $('.btntooltip .close').click(function () {
                    $(this).parents('.sub').slideUp("slow");
                });
                // Process reload in the end.
                if (reload) {
                    return window.location.reload();
                }
            } else if (data['login-url']) {
                //$("body").removeClass("loading");
                location.href = data['login-url'];
            } else {
                if (element.id == 'btnApplyCouponCode') {
                    $(element).parents('.collapse-toogle').find('.validator').text(data['error']).removeClass('black').removeClass('hide');

					// EDIT FLOW
					if (!$('#divpromotion').hasClass('hide')) {
						$('#divpromotion').addClass('hide');
						$('#coupon__code').val('');
						$('#txtCouponCode').val('');
					}
                } else {
                    //$("body").removeClass("loading");
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                    $('.dlg-notify').modal({
                        'keyboard': true,
                        'show': true
                    });
                }
                fncCallbackFail();
                // Process reload in the end.
                /*if (reload) {
                    return window.location.reload();
                }*/
            }
        },
        error: function (xhr, err) {
            //$("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
            fncCallbackFail();
        }
    });
};

function deletecart(element) {
    var param = {
        'id': $(element).attr('item-id')
    };
    var method = 'post';
    var url = siteUrl + '/api/deletecart';
    //$("body").addClass("loading");
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(param),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                //$("body").removeClass("loading");
                $("#lstitems .sub").remove();
                $("#lstitems").append(data['content']);
                if (data['cart_qty'] > 0) {
                    $(".prod-cart-qty").html('(' + data['cart_qty'] + ')');
                } else {
                    $(".prod-cart-qty").html('');
                }
                dataLayer.push({
                    "event": "removeFromCart",
                    "ecommerce": {
                        "currencyCode": "VND",
                        "remove": {
                            "products": [data['product']]
                        }
                    }
                });
				//-- ematic push
				frontEnd.ematicPush(data['items'], 'cart');
				//-- end ematic
                /*$('.dlg-notify').modal({'keyboard':true,'show':true});
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('Thực hiện xóa thành công!');
                setTimeout(function()
                {
                    location.reload();
                },1000);*/
            } else if (data['login-url']) {
                //$("body").removeClass("loading");
                location.href = data['login-url'];
            } else {
                //$("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
            }
        },
        error: function (xhr, err) {
            //$("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
        }
    });
};

function updatepaymentaddress() {
    $('#lblbilling_fullname').html($('#billing_fullname').val());
    $('#lblbilling_address').html($('#billing_address').val());
    $('#lblbilling_province_id').html($('#billing_province_id option:selected').text());
    $('#lblbilling_province_id').data('province_id', $('#billing_province_id option:selected').val());
    $('#billing_province_name').val($('#billing_province_id option:selected').text());
    $('#lblbilling_phone').html($('#billing_phone').val());
    $('#lblshipping_fullname').html($('#shipping_fullname').val());
    $('#lblshipping_address').html($('#shipping_address').val());
    $('#lblshipping_province_id').html($('#shipping_province_id option:selected').text());
    $('#shipping_province_name').val($('#shipping_province_id option:selected').text());
    $('#lblshipping_province_id').data('province_id', $('#shipping_province_id option:selected').val());
    $('#lblshipping_phone').html($('#shipping_phone').val());
    $('.paymentaddress .edit,.shippingaddress .edit,.paymentbotton .edit').addClass('hide');
    $('.paymentaddress .view,.shippingaddress .view,.paymentbotton .view').removeClass('hide');
};

function updateorderaddress(param) {
    var method = 'post';
    var url = siteUrl + '/api/updateorderaddress';
    $.ajax({
        url: url,
        type: method,
        cache: false,
        contentType: 'application/x-www-form-urlencoded',
        dataType: 'json',
        data: $.param(param),
        success: function (data) {
            if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                updatepaymentaddress();
            } else {
                //$("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
            }
        },
        error: function (xhr, err) {
            //$("body").removeClass("loading");
            $('.dlg-notify .modal-title').html('Thông báo');
            $('.dlg-notify').modal({
                'keyboard': true,
                'show': true
            });
            $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
        }
    });
};

function initselect2() {
    $(".select3").each(function (index) {
        var self = $(this);
        self.select2({
            placeholder: self.attr('placeholder'),
            width: self.attr('width') != undefined && self.attr('width') != null ? self.attr('width') : '100%',
        });

        self.parent().find('.btn-info').click(function () {
            self.children('option').prop("selected", "selected");
            $(this).addClass('hide');
            self.parent().find('.btn-danger').removeClass('hide');
            self.trigger("change");
        });

        self.parent().find('.btn-danger').click(function () {
            self.children('option').removeAttr("selected");
            $(this).addClass('hide');
            self.parent().find('.btn-info').removeClass('hide');
            self.trigger("change");
        });
    });
};

function initcheckbox() {
    $('.checkbox').click(function (e) {
        console.log("click");
        e.stopPropagation();
        if ($(this).hasClass('checked')) {
            $(this).removeClass('checked');
        } else {
            $(this).addClass('checked');
        }
    });
};

//var flgPriceSearch = false;

/* --- DuyNg -----*/
function setProductsHeight($productList) {
    var maxHeight = 0,
        $products = jQuery('.col-xs-6', $productList);
    $products.each(function (index, product) {
        var height = jQuery(product).height();
        if (height > maxHeight)
            maxHeight = height;
    });

    if (maxHeight)
        $products.height(maxHeight);
}

jQuery(document).ready(function ($) {
    lazyload();
	filter(false, false, true);

    // Add toggle search form for mobile.
    $('#btn__toggle_search').on('click', function () {
        $('.form-search-v2').toggleClass('show-search-box');
		//$(this).toggleClass('show-search-box');
    });

    if ($('.dlg-voucher').length > 0 && getCookie('voucherclient') == '') {
        setCookie('voucherclient', '1', 10);
        $('.dlg-voucher').modal({
            'keyboard': false,
            'show': true,
            backdrop: 'static'
        });
    }
    // set height for products in products page
    var $productList = jQuery('.prod-list');
    if ($productList.length) {
        var resizeTimer = -1;
        jQuery(window).resize(function () {
            jQuery('.col-xs-6', $productList).removeAttr('style');
            if (resizeTimer)
                clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                resizeTimer = -1;
                setProductsHeight($productList);
            }, 300);
        }).trigger('resize');
    }
    initselect2();
    var delay = 1000,
        setTimeoutConst;
    $('.btntooltip').hover(function () {
        var this1 = this;
        setTimeoutConst = setTimeout(function () {
            $(this1).children('.sub').slideDown("slow");
        }, delay)

    }, function () {
        clearTimeout(setTimeoutConst);
        $(this).children('.sub').slideUp("slow");
    });

    $('.btntooltip .close').click(function () {
        $(this).parents('.sub').slideUp("slow");
    });

    /*$('.zoomContainer').hover(function(){
        alert('');
        $('.prod-image .imageNav').removeClass('hide');
    }, function(){
        $('.prod-image .imageNav').addClass('hide');
    });*/

    if ($('.datepicker').length > 0) {
        $('.datepicker').datetimepicker({
            format: "DD-MM-YYYY",
            useCurrent: false
        });
        if ($('#txtbirthday').length > 0) {
            $('#txtbirthday').data("DateTimePicker").maxDate(new Date);
            $('#txtbirthday').on("dp.change", function (e) {
                $('#frmregister').data('bootstrapValidator').revalidateField('birthday');
            });
        }
    };

    $('.quantity_minus').click(function () {
        var valn = parseInt($(this).parents('tr').next().next().find('.quantity').text());
        var valo = parseInt($(this).parent().children('.quantity').val());
        var val = valo + (isNaN(valn) ? 0 : valn);
        if (val > 1) {
            val--;
            valo--;
            $(this).parent().children('.quantity').val(valo);
			//-- ematic push
			//frontEnd.ematicPush({"id": $(this).parents('.product-info-custom').data('productid'), "quantity": val});
			//-- end ematic
            var param = {
                'product_id': $(this).parents('.product-info-custom').data('productid'),
                'quantity': val,
                'product_options': $(this).parents('.product-info-custom').attr('product-options'),
                'size_id': $(this).parents('.product-info-custom').data('size'),
                'product_name': $(this).parents('.product-info-custom').data('product-name'),
                'size_name': $(this).parents('.product-info-custom').data('size-name')
            };
            if ($('#shipping_province_id').length > 0) {
                param.shipping_province_id = $('#shipping_province_id').val();
            }
            updatecart(param, this, true, function(){
                valo++;
                $('.quantity--' + id).val(valo);
            });
        }
        return false;
    });

    $('.quantity_minus_custom').click(function () {
        var valn = parseInt($(this).parents('tr').next().next().find('.quantity').text());
        var valo = parseInt($(this).parent().children('.quantity').val());
        var val = valo + (isNaN(valn) ? 0 : valn);
        var id = $(this).data('id');
        if (val > 1) {
            val--;
            valo--;
            if (id) {
                // Update quantity's value changed to input.
                $('.quantity--' + id).val(valo);
            }
            var param = {
                'product_id': $(this).parents('.product-info-custom').data('productid'),
                'quantity': val,
                'product_options': $(this).parents('.product-info-custom').attr('product-options'),
                'size_id': $(this).parents('.product-info-custom').data('size'),
                'product_name': $(this).parents('.product-info-custom').data('product-name'),
                'size_name': $(this).parents('.product-info-custom').data('size-name')
            };
            if ($('#shipping_province_id').length > 0) {
                param.shipping_province_id = $('#shipping_province_id').val();
            }
            updatecart(param, this, true, function(){
                valo++;
                $('.quantity--' + id).val(valo);
            });
        }
        return false;
    });

    $('.quantity_plus').click(function () {
        var valn = parseInt($(this).parents('tr').next().next().find('.quantity').text());
        var valo = parseInt($(this).parent().children('.quantity').val());
        var val = valo + (isNaN(valn) ? 0 : valn);
        var id = $(this).data('id');
        if (val < 200) {
            val++;
            valo++;
            if (id) {
				//-- ematic push
				//frontEnd.ematicPush({"id": $(this).parents('.product-info-custom').data('productid'), "quantity": val});
				//-- end ematic
                // Update quantity's value changed to input.
                $('.quantity--' + id).val(valo);
            }
            var param = {
                'product_id': $(this).parents('.product-info-custom').data('productid'),
                'quantity': val,
                'product_options': $(this).parents('.product-info-custom').attr('product-options'),
                'size_id': $(this).parents('.product-info-custom').data('size'),
                'product_name': $(this).parents('.product-info-custom').data('product-name'),
                'size_name': $(this).parents('.product-info-custom').data('size-name')
            };
            if ($('#shipping_province_id').length > 0) {
                param.shipping_province_id = $('#shipping_province_id').val();
            }
            updatecart(param, this, true, function(){
                valo--;
                $('.quantity--' + id).val(valo);
            });
        }
        return false;
    });

    $('.quantity_plus_custom').click(function () {
        var rowId = parseInt($(this).parents('tr').next().next().find('.rowId').text());
        var valn = parseInt($(this).parents('tr').next().next().find('.quantity').text());
        var valo = parseInt($(this).parent().children('.quantity').val());
        var val = valo + (isNaN(valn) ? 0 : valn);
        if (val < 200) {
            val++;
            valo++;
            $(this).parent().children('.quantity').val(valo);
            var param = {
                'product_id': $(this).parents('.product-info-custom').data('productid'),
                'quantity': val,
                'rowId': rowId,
                'product_options': $(this).parents('.product-info-custom').attr('product-options'),
                'size_id': $(this).parents('.product-info-custom').data('size'),
                'product_name': $(this).parents('.product-info-custom').data('product-name'),
                'size_name': $(this).parents('.product-info-custom').data('size-name')
            };
            if ($('#shipping_province_id').length > 0) {
                param.shipping_province_id = $('#shipping_province_id').val();
            }
            updatecart(param, this, true, function(){
                valo--;
                $('.quantity--' + id).val(valo);
            });
        }
        return false;
    });

    // If mobile minus quantity clicked then auto trigger main quantity minus click.
    $('#mobile_quantity__minus').on('click', function () {
        $('#quantity__minus').trigger('click');
    });
    // If mobile plus quantity clicked then auto trigger main quantity plus click.
    $('#mobile_quantity__plus').on('click', function () {
        $('#quantity__plus').trigger('click');
    });

    /*if ($('.subtotal').length > 0) {
        var param = {};
        if ($('#shipping_province_id').length > 0) {
            param.shipping_province_id = $('#shipping_province_id').val();
        }
        updatecart(param, this, false);
    }*/

    $('#shipping_province_id').change(function () {
        if ($.trim($(this).val()) != '') {
            var param = {
                'shipping_province_id': $(this).val()
            };
            updatecart(param, this, false);
        }
    });

    $('.size_next').click(function () {
        var indx = $(this).parent().children('.size.active').index();
        var sizecount = $(this).parent().children('.size').length;
        if (sizecount > 1) {
            if (indx < sizecount) {
                indx++;
            } else {
                indx = 1;
            }
            $(this).parent().children('.size').removeClass('active').addClass('hide');
            $(this).parent().children('.size:eq(' + (indx - 1).toString() + ')').removeClass('hide').addClass('active');
        }
    });

    $('.size_prev').click(function () {
        var indx = $(this).parent().children('.size.active').index();
        var sizecount = $(this).parent().children('.size').length;
        if (sizecount > 1) {
            if (indx > 1) {
                indx--;
            } else {
                indx = sizecount;
            }
            $(this).parent().children('.size').removeClass('active').addClass('hide');
            $(this).parent().children('.size:eq(' + (indx - 1).toString() + ')').removeClass('hide').addClass('active');
        }
    });

    if ($('.payment').length > 0) {
        updatepaymentaddress();
        paymentaddressvalidator();
        $('#btnpayment_address').click(function () {
            $('.paymentaddress .edit,.shippingaddress .edit,.paymentbotton .edit').removeClass('hide');
            $('.paymentaddress .view,.shippingaddress .view,.paymentbotton .view').addClass('hide');
			loadDistrictByProvince();
        });

        $('#btnpayment_save').click(function () {
            $('#frmPaymentAddress').bootstrapValidator('validate');
            if ($('#frmPaymentAddress').data('bootstrapValidator').isValid() == true) {

				//-- set params
				districtId = $('#slcDistrict').val();
				provinceId = $('#slcProvine').val();

                var param = {
                    'billing_fullname': $('#billing_fullname').val(),
                    'billing_address': $('#billing_address').val(),
                    'billing_province_name': $('#billing_province_id option:selected').text(),
                    'billing_province_id': $('#billing_province_id option:selected').val(),
                    'billing_phone': $('#billing_phone').val(),
                    'shipping_fullname': $('#shipping_fullname').val(),
                    'shipping_address': $('#shipping_address').val(),
                    'shipping_province_name': $('#shipping_province_id option:selected').text(),
                    'shipping_province_id': $('#shipping_province_id option:selected').val(),
                    'shipping_phone': $('#shipping_phone').val(),
					'district_id': $('#slcDistrict').val(),
					'district_name': $('#slcDistrict option:selected').text(),
					'province_id': $('#slcProvine').val(),
					'province_name': $('#slcProvine option:selected').text()
                };

                updateorderaddress(param);
            }
        });

        $('#btnpayment_cancel').click(function () {
            $('#billing_fullname').val($('#lblbilling_fullname').html());
            $('#billing_address').val($('#lblbilling_address').html());
            $('#billing_province_id').val($('#lblbilling_province_id').data('province_id'));
            $('#billing_province_id').trigger('change');
            $('#billing_phone').val($('#lblbilling_phone').html());
            $('#shipping_fullname').val($('#lblshipping_fullname').html());
            $('#shipping_address').val($('#lblshipping_address').html());
            $('#shipping_province_id').val($('#lblshipping_province_id ').data('province_id'));
            $('#shipping_province_id').trigger('change');
            $('#shipping_phone').val($('#lblshipping_phone').html());
            $('.paymentaddress .edit,.shippingaddress .edit,.paymentbotton .edit').addClass('hide');
            $('.paymentaddress .view,.shippingaddress .view,.paymentbotton .view').removeClass('hide');
        });
    }

    $('.article-play').click(function () {
        $('#dlgMovie').modal({
            'keyboard': true,
            'show': true
        });
        $('#dlgMovie iframe').attr('src', $(this).attr('link'));
        $('#dlgMovie').on('hidden.bs.modal', function () {
            $('#dlgMovie iframe').attr('src', '');
        })
        return false;
    });

    $('.icon-toggle').click(function () {
        if ($('.body').hasClass("open")) {
            $('.body').removeClass("open");
        } else {
            $('.body').addClass("open");
            //$('.body.open .navbar-collapse.collapse').slimScroll();
        }
    });

    $(".navbar-nav li").click(function (e) {
        var w = $(window).width();
        if (w > (1200-1) || $(this).children('.sub-menu').length <= 0) {
            return true;
        }
        $('#submenus').html($(this).children('.sub-menu').html());
        $('#submenus').addClass("open");
        return false;
    });
    $(document).on("click", "#submenus .menu-child>li>span", function (e) {
        if (!$(this).parent().children('.sub-menu-child').hasClass("open")) {
            $(this).parent().children('.sub-menu-child').addClass("open");
        }
    });

    $(document).on("click", "#submenus .back", function (e) {
        $('#submenus').html('');
        $('#submenus').removeClass("open");
        e.stopPropagation();
    });

    $(document).on("click", "#submenus .backed", function (e) {
        $('.sub-menu-child').removeClass("open");
        e.stopPropagation();
    });

    $("#btnApplyCouponCode").click(function () {
        if ($.trim($('#txtCouponCode').val()) != '') {
            var param = {
                'coupon_code': $.trim($('#txtCouponCode').val())
            };
            if ($('#shipping_province_id').length > 0) {
                param.shipping_province_id = $('#shipping_province_id').val();
            }
            updatecart(param, this, false);
            //$(this).parent().children('.validator').removeClass('hide');
        }
        return false;
    });

    $('.payment_method').click(function (e) {
        $(this).parents('ul').find('.collapse-toogle').removeClass('in');
        $(this).parents('.collapse-toogle').addClass('in');
        $('#paymenttype').val($(this).data('value'));
        var param = {
            "shipping_province_id": $('#shipping_province_id').val(),
            "paymenttype": $(this).data('value')
        };
        updatecart(param, this, false);
    });

    if ($('#designerviewall').length > 0) {
        $('#designerviewall').click(function () {

            $('#lstBrand ul li').removeClass('hide');
            $(this).parent().addClass('hide');
            return false;
        });
    }

    if ($('#lstBrand ul li a').length > 0) {
        function owl_carousel_page_numbers(e) {

            if (!e.namespace || e.property.name != 'position') return;

            var items_per_page = e.page.size;
            var pagetotal = Math.ceil(e.item.count / items_per_page);
            var page = pagetotal - Math.floor(e.item.count / (e.item.index * items_per_page));
            var currentPage = (e.item.index != 0 && page > 0) ? page : 1;

            $('#pageCollection').text('Trang ' + currentPage + '/' + pagetotal);

        }


        function initCollections(collection_id) {
            var param = {
                'brand_id': $('#lstBrand ul li a.active').data('designer-id'),
                'collection_id': collection_id
            };
            var method = 'post';
            var url = siteUrl + '/api/collectionbydesigner';
            var this1 = this;
            $.ajax({
                url: url,
                type: method,
                cache: false,
                contentType: 'application/x-www-form-urlencoded',
                dataType: 'json',
                data: $.param(param),
                success: function (data) {
                    if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                        $('#lstCollections').html(data['content']);
                        $("#slcCollections").val(data['collection_id']);
                        initselect2();
                        $('#slcCollections').change(function () {
                            //initCollections($(this).val());
                            window.location.href = $(this).find("option:selected").data("url");
                        });
                        $('.collection-img').click(function (e) {
                            e.stopPropagation();
                            var this2 = this;
                            if ($(this).parent().find('.lstproducts').text() != '') {
                                $(this).parent().find('.collection-modal').removeClass('hide');
                            } else {
                                var param = {
                                    'ids': $(this).data('products')
                                };
                                var method = 'post';
                                var url = siteUrl + '/api/collectionproducts';
                                //$("body").addClass("loading");
                                $.ajax({
                                    url: url,
                                    type: method,
                                    cache: false,
                                    contentType: 'application/x-www-form-urlencoded',
                                    dataType: 'json',
                                    data: $.param(param),
                                    success: function (data) {
                                        if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                                            $(this2).parent().find('.lstproducts').html(data['content']);
                                            $(this2).parent().children('.collection-modal').removeClass('hide');
                                            $('body').click(function (evt) {
                                                if (!$(evt.target).hasClass('collection-products')) {
                                                    $(".collection-modal").addClass('hide');
                                                }
                                            });
                                            initcheckbox();
                                            $('.lstproducts .sizes .box a').click(function (e) {
                                                e.stopPropagation();
                                                $(this).parents('.sizes').children('.box').removeClass('active');
                                                $(this).parent().addClass('active');
                                                $(this).parents('.checkbox').addClass('checked');
                                                $(this).parents('.lstproducts').find('.validator').addClass('hide');
                                                return false;
                                            });

                                            $('.btnaddproducttocart').click(function (e) {
                                                e.stopPropagation();
                                                var flg = true
                                                if ($(this).parent('.collection-products').find('.checkbox.checked').length > 0) {
                                                    $(this).parent('.collection-products').find('.checkbox.checked').each(function () {
                                                        if ($(this).find('.sizes .active').length <= 0) {
                                                            $(this).parent().find('.validator-size').removeClass('hide');
                                                            flg = false;
                                                        } else {
                                                            $(this).parent().find('.validator-size').addClass('hide');
                                                        }
                                                    });
                                                } else {
                                                    $(this).parent().find('.validator').removeClass('hide');
                                                    flg = false;
                                                }
                                                if (!flg) {
                                                    return;
                                                }
                                                /*if($('.lstproducts .sizes .active').length<=0)
                                                {
                                                    $('.lstproducts .sizes + .validator').removeClass('hide');
                                                    return;
                                                }*/
                                                var prodcnt = ($(this).parent().find('.lstproducts .checkbox.checked').length);
                                                if (prodcnt > 0) {
                                                    var params = [];
                                                    $(this).parent().find('.lstproducts .checkbox.checked').each(function (index) {
                                                        var param = {
                                                            'product_id': $(this).data('id'),
                                                            'color_name': '',
                                                            'image': $(this).data('image'),
                                                            'product_options': '{"color":{"color_id":"","color_code":""},"size":"' +
                                                                ($(this).find('.sizes .box.active a').length > 0 ? $(this).find('.sizes .box.active a').html() : $(this).find('.sizes label:first-child a').html()) + '"}',
                                                            'description': ''
                                                        };
                                                        params.push(param);
                                                    });
                                                    paramcnt = 0;
                                                    addprodstocart(params, paramcnt);
                                                }
                                                return false;
                                            });

                                            $('.btnaddproducttowishlist').click(function (e) {
                                                e.stopPropagation();
                                                var flg = true
                                                $(this).parent('.collection-products').find('.checkbox.checked').each(function () {
                                                    if ($(this).find('.sizes .active').length <= 0) {
                                                        $(this).parent().find('.validator').removeClass('hide');
                                                        flg = false;
                                                    } else {
                                                        $(this).parent().find('.validator').addClass('hide');
                                                    }
                                                });
                                                if (!flg) {
                                                    return;
                                                }
                                                var prodcnt = ($(this).parent().find('.lstproducts .checkbox.checked').length);
                                                if (prodcnt > 0) {
                                                    var params = [];
                                                    $(this).parent().find('.lstproducts .checkbox.checked').each(function (index) {
                                                        var param = {
                                                            'product_id': $(this).data('id'),
                                                            'color_name': '',
                                                            'product_name': $(this).data('prodname'),
                                                            'image': $(this).data('image'),
                                                            'brand_name': $(this).data('designername'),
                                                            'price': $(this).data('price'),
                                                            'alias': $(this).data('alias'),
                                                            'product_options': '{"color":{"color_id":"","color_code":""},"size":"' +
                                                                ($(this).find('.sizes .box.active a').length > 0 ? $(this).find('.sizes .box.active a').html() : $(this).find('.sizes label:first-child a').html()) + '"}',
                                                            'description': ''
                                                        };
                                                        params.push(param);
                                                    });
                                                    paramcnt = 0;
                                                    addprodstowishlist(params, paramcnt);
                                                }
                                                return false;
                                            });
                                        }
                                    },
                                    error: function (xhr, err) {
                                        /*$("body").removeClass("loading");
                                        $('.dlg-notify .modal-title').html('Thông báo');
                                        $('.dlg-notify').modal({'keyboard':true,'show':true});
                                        $('.dlg-notify .modal-body').html('<span class="color-red">'+formatErrorMessage(xhr, err)+'</span>');*/
                                    }
                                });
                            }
                        });

                        /*$('.collection-modal').click(function(){
                            $(this).addClass('hide');
                        });*/

                        /*$('.collection-products').click(function(e){
                            e.preventDefault();
                            return false;
                        })*/

                        $('#lbldesignername').text($('#lstBrand ul li a.active').text());
                        var owl_collection = $('.collection-carousel').owlCarousel({
                            loop: false,
                            nav: true,
                            margin: 5,
                            responsiveClass: true,
                            slideBy: 2,
                            responsive: {
                                0: {
                                    items: 1,
                                },
                                600: {
                                    items: 2,
                                },
                                1000: {
                                    items: 2,
                                },
                            },
                            autoplay: true,
                            autoplayTimeout: 5000,
                            autoplayHoverPause: true
                        });
                        owl_collection.on('initialized.owl.carousel changed.owl.carousel resized.owl.carousel', function (e) {
                            if (!e.namespace || e.property.name != 'position') return;
                            owl_carousel_page_numbers(e);
                        });
                    } else {
                        //$("body").removeClass("loading");
                        $('.dlg-notify .modal-title').html('Thông báo');
                        $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                        $('.dlg-notify').modal({
                            'keyboard': true,
                            'show': true
                        });
                    }
                },
                error: function (xhr, err) {
                    //$("body").removeClass("loading");
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify').modal({
                        'keyboard': true,
                        'show': true
                    });
                    $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
                }
            });
        }

        initCollections($('#txtCollectionID').val());

        $('#lstBrand ul li a').click(function () {
            $('#lstBrand ul li a').removeClass('active');
            $(this).addClass('active');
            initCollections("");
            return false;
        });
    }

    if ($('.product-designer ul').length && $('.product-designer ul li').length > 10) {
        $('.product-designer ul').slimScroll({
            alwaysVisible: true,
            railVisible: true,
            height: 255
        });
    }
    if ($('.product-size ul').length && $('.product-size ul li').length > 10) {
        $('.product-size>div.split').slimScroll({
            alwaysVisible: true,
            railVisible: true,
            scrollOverflow: true,
            height: 255
        });
    }

    initcheckbox();

    $('.printbill').click(function () {
        var content = document.getElementById('print_content').innerHTML;
        var win = window.open();
        win.document.write(content);
        win.print(); // JavaScript Print Function
        win.close();
        //$("#print_content").print();
        return false;
    })

    $('.opt-checkbox').click(function () {
        $('.opt-checkbox').removeClass('checked');
        $(this).addClass('checked');
    });

    $('.product-designer .checkbox,.product-size .checkbox,.product-type .checkbox').click(function () {
        filter(false, true);
    });

    $('#tag-filter span').click(function (event) {
        event.preventDefault();
        $('#tag-filter span').removeClass('active');
        $(this).addClass('active');
        filter(false, true);
        return;
    })

    // jQuery Scroll effect
    $('.gotop').click(function (event) {
        $('html, body').stop().animate({
            scrollTop: 0
        }, 500);

        event.preventDefault();
        return false;
    });

    if ($('#btn-options').length) {
        $('#btn-options a').each(function (index) {
            if ($('#' + $(this).data('id')).length == 0) {
                $(this).hide();
            }
        });
    }

    //.toLocaleString('de-DE')
    if ($("#txtPrice").length) {
        var slider = $("#txtPrice").slider({});
		var price = $("#txtPrice").val();
        $('#lblPrice').html(convertNumber(price) + ' VND');
        $("#txtPrice").on("slide", function (slideEvt) {
			$('#lblPrice').html(convertNumber(slideEvt.value.toString()) + ' VND');
        });
        $("#txtPrice").on("slideStop", function (slideEvt) {
            //flgPriceSearch = true;
            filter(false, true);
        });
    };
    if ($(".bestsale-carousel").length) {
        $('.bestsale-carousel').owlCarousel({
            margin: 31,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 12000,
            nav: true,
            lazyLoad: true,
            loop: true,
			autoplayHoverPause: true,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    slideBy: 2,
                },
                600: {
                    items: 3,
                    slideBy: 3,
                },
                1000: {
                    items: 4,
                    slideBy: 4,
                },
            },
            navText: ['', '']
        });
    };
	if ($(".product-carousel").length) {
        $('.product-carousel').owlCarousel({
            margin: 30,
            autoHeight: true,
            autoplay: false,
            autoplayTimeout: 4000,
            nav: true,
            lazyLoad: true,
            loop: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    slideBy: 2,
                },
                600: {
                    items: 3,
                    slideBy: 3,
                },
                1000: {
                    items: 4,
                    slideBy: 4,
                },
            },
            navText: ['', '']
        });
    };
    if ($(".designer-carousel").length) {
        $('.designer-carousel').owlCarousel({
            margin: 30,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 4000,
            nav: true,
            lazyLoad: true,
            loop: false,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
            },
            navText: ['', '']
        });
    };

	if ($(".styles-carousel").length) {
        $('.styles-carousel').owlCarousel({
            margin: 30,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 5000,
            nav: true,
            lazyLoad: true,
            loop: true,
			autoplayHoverPause: true,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
            },
            autoplayHoverPause: true,
            navText: ['<span class="icon icon-prev"></span>', '<span class="icon icon-next"></span>']
        });
    };

    if ($(".articel-carousel").length) {
        $('.articel-carousel').owlCarousel({
            items: 5,
            loop: true,
            nav: true,
            lazyLoad: true,
            center: true,
            margin: 15,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
            },
            autoplay: true,
            dots: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ['<span class="icon icon-prev"></span>', '<span class="icon icon-next"></span>']
        });
    };

    if ($(".slider-carousel").length) {
        $('.slider-carousel').owlCarousel({
            items: 1,
            margin: 10,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout: 12000,
			autoplayHoverPause: true,
            nav: true,
            lazyLoad: true,
            loop: true,
            navText: ['<span class="icon icon-prev"></span>', '<span class="icon icon-next"></span>']
        });
    };
    var curentIndex = 0;

    $('.video').click(function () {
        $(this).addClass('active');
        curentIndex = 0;
        $('#thumbnails-container li.show').removeClass('active');
        $('.prod-image img').hide();
        $('.prod-image video').show();
        $('.zoomContainer').addClass('hide');
        $('.productmodel').addClass('hide');
        video.play();
    });

    $('.collection-alpha a').click(function () {
        $('.collection-alpha a').removeClass('active');
        $(this).addClass('active');
        var reg = new RegExp("^[" + $(this).text().toLowerCase() + "]");
        var i = 0;
        var flgchange = false;
        //$('#lstBrand a.brand_name').removeClass('active');
        $('#lstBrand a.brand_name').each(function (index) {
            if ($(this).text().toLowerCase().match(reg)) {
                $(this).parents('li').removeClass('hide');
                if (i == 0) {
                    flgchange = !$(this).hasClass('active');
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
                i++;
                //alert(i);
            } else {
                $(this).parents('li').addClass('hide');
                $(this).removeClass('active');
            }
        });
        if (i > 0 && flgchange) {
            $('#lstBrand ul li .brand_name.active').trigger('click');
        }
        $('#lstBrand #designerviewall').parents('li').addClass('hide');
        return false;
    })

    if ($('.prod-image img').length) {
        $('body').click(function (evt) {
            if (!$(evt.target).hasClass('productmodel') && !($(evt.target).parents('.productmodel').length > 0) && !(evt.target.id == 'productmodel')) {
                $('.productmodel').addClass('hide');
            }
        });

        $('#thumbnails-container img').click(function () {
            $('.prod-image img').show();
            $('.prod-image video').hide();
            $('.video').removeClass('active');
            $('.zoomContainer').removeClass('hide');

            var cnt = 6;
            var w = $(window).width();
            if (w > 767) {
                var ez = $('.prod-image img').data('elevateZoom');
                ez.swaptheimage($(this).attr('data-image'), $(this).attr('data-zoom-image'));
            } else if ($(this).attr('data-image') != undefined && $(this).attr('data-image') != null && $(this).attr('data-image') != '') {
                $('.prod-image img').attr('src', $(this).attr('data-image'));
            }
            $('#thumbnails-container li.show').removeClass('active');
            $(this).parent().addClass('active');
            if ($('#thumbnails-container ul li.show').length - $(this).parent().index() >= cnt) {
                $('#thumbnails-container ul').css({
                    'position': 'absolute',
                    'top': "-" + (String($(this).parent().index() * 87) + 'px')
                });
            }
            if ($('.video').length > 0) {
                video.pause();
                video.currentTime = 0;
            }
        });



        $('#up-arrow .thumbnails-arrow').click(function () {
            $('.prod-image img').show();
            $('.prod-image video').hide();
            $('.video').removeClass('active');
            $('.zoomContainer').removeClass('hide');
            $('.productmodel').addClass('hide');
            curentIndex = curentIndex + 1;
            var cnt = 6;
            /*var curentIndex =  ($('#thumbnails-container li.show.active').index());*/
            if (curentIndex >= $('#thumbnails-container ul li.show').length) {
                curentIndex = 0;
            }

            $('#thumbnails-container li.show').removeClass('active');
            $('#thumbnails-container li.show').eq(curentIndex).addClass('active');
            if ($('#thumbnails-container ul li.show').length - curentIndex >= cnt) {
                $('#thumbnails-container ul').css({
                    'position': 'absolute',
                    'top': "-" + (String((curentIndex) * 87) + 'px')
                });
            }
            /*else
            {
                $('#thumbnails-container ul').css({'position':'absolute','top': "-"+(($('#thumbnails-container ul li.show').length - 6)*87) + 'px'});
            }*/
            var w = $(window).width();
            if (w > 767) {
                var ez = $('.prod-image img').data('elevateZoom');
                ez.swaptheimage($('#thumbnails-container li.show').eq(curentIndex).children('img').attr('data-image'), $('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-zoom-image'));
            } else if ($('#thumbnails-container li.show').eq(curentIndex).children('img').attr('data-image') != undefined &&
                $('#thumbnails-container li.show').eq(curentIndex).children('img').attr('data-image') != null &&
                $('#thumbnails-container li.show').eq(curentIndex).children('img').attr('data-image') != '') {
                $('.prod-image img').attr('src', $('#thumbnails-container li.show').eq(curentIndex).children('img').attr('data-image'));
            }
            video.pause();
            video.currentTime = 0;
        });


        $('#down-arrow .thumbnails-arrow').click(function () {
            $('.prod-image img').show();
            $('.prod-image video').hide();
            $('.video').removeClass('active');
            $('.zoomContainer').removeClass('hide');
            $('.productmodel').addClass('hide');
            var cnt = 6;
            /*var curentIndex =  ($('#thumbnails-container li.show.active').index());*/
            if (curentIndex <= 0) {
                curentIndex = $('#thumbnails-container ul li.show').length;
            }
            $('#thumbnails-container li.show').removeClass('active');
            $('#thumbnails-container li.show').eq(curentIndex - 1).addClass('active');
            if (curentIndex - cnt >= 0) {
                $('#thumbnails-container ul').css({
                    'position': 'absolute',
                    'top': "-" + (String((curentIndex - cnt) * 87) + 'px')
                });
            }
            var w = $(window).width();
            if (w > 767) {
                var ez = $('.prod-image img').data('elevateZoom');
                ez.swaptheimage($('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-image'), $('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-zoom-image'));
            } else if ($('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-image') != undefined &&
                $('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-image') != null &&
                $('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-image') != '') {
                $('.prod-image img').attr('src', $('#thumbnails-container li.show').eq(curentIndex - 1).children('img').attr('data-image'));
            }
            curentIndex = curentIndex - 1;
            video.pause();
            video.currentTime = 0;
        });

        $('.imageNav .icon-imgprev').click(function () {
            $('#up-arrow .thumbnails-arrow').trigger('click');
        });

        $('.imageNav .icon-imgnext').click(function () {
            $('#down-arrow .thumbnails-arrow').trigger('click');
        });
    };

    //$('.prod-image img a').removeClass('active').eq(currentValue-1).addClass('active');
    //var ez = $('#zoom_09').data('elevateZoom'); ez.swaptheimage(smallImage, largeImage);

    /*$(".btntooltip").click(function(){
        $('.tooltip').hide();
        $(this).parent().children('.tooltip').show().focus();
        return false;
    });

    $('.tooltip').focusout(function(){
        $('.tooltip').hide();
    });*/

	const body = document.body;
	const nav = document.querySelector("#fix-menu");
	//console.log(nav);
	const notify = document.querySelector("#fix-menu > #promo-banner");
	const scrollUp = "scroll-up";
	const scrollDown = "scroll-down";
	let lastScroll = 0;

	if($( document ).height() > 700 && nav != null){
		window.addEventListener("scroll", () => {
			const currentScroll = window.pageYOffset;
			if (currentScroll == 0) {
				nav.classList.remove(scrollUp);
				nav.classList.remove(scrollDown);
				return;
			}

			if (currentScroll > lastScroll && !nav.classList.contains(scrollDown)) {
				// down
				nav.classList.remove(scrollUp);
				nav.classList.add(scrollDown);
			} else if (currentScroll < lastScroll && nav.classList.contains(scrollDown)) {
				// up
				nav.classList.remove(scrollDown);
				nav.classList.add(scrollUp);
			}
			lastScroll = currentScroll;
		});
	}

	// Initial state
	var scrollPos = 0;
	var downScroll = 0;
	var upScroll = 0;
	// adding scroll event
	/*window.addEventListener('scroll', function(){
		// detects new state and compares it with the new one
		if ((document.body.getBoundingClientRect()).top > scrollPos){
			upScroll = (document.body.getBoundingClientRect()).top;
			var scrollUp = parseInt(downScroll - (document.body.getBoundingClientRect()).top);
			if(scrollUp <= -200){
				if (!$('#fix-menu').hasClass('fix-menu-custom')) {
					$('#fix-menu').addClass('fix-menu-custom');
					$('#fix-menu').addClass('animated slideInDown');
				} else {
					$('#fix-menu').removeClass('animated');
					$('#fix-menu').removeClass('slideOutUp');
					$('#fix-menu').addClass('animated slideInDown');
				}
			}
		} else {
			downScroll = (document.body.getBoundingClientRect()).top;
			var scrollDown = parseInt(downScroll - upScroll);
			if(scrollDown <= -200){
				if ($('#fix-menu').hasClass('fix-menu-custom')) {
					$('#fix-menu').removeClass('slideInDown');
					$('#fix-menu').removeClass('animated');
					$('#fix-menu').addClass('animated slideOutUp');
				}
			}
		}

		// saves the new position for iteration.
		scrollPos = (document.body.getBoundingClientRect()).top;
	});*/

    $(window).scroll(function () {
        $('.number').keyup(function () {
            var val = this.value.replace(/[^0-9]/g, '');
            this.value = val;
        });

        var height = $(window).scrollTop();

		/* ADD NEW 19/02/2020 */
		if(height == 0){
			if ($('#fix-menu').hasClass('fix-menu-custom')) {
				$('.site-heading-area').removeClass('animated slideInDown');
			}
		}

		/* COMMENT 19/02/2020 */
        /*if (height >= 200) {
            if (!$('.content-wrapper').hasClass('top-fixed')) {
                $('.content-wrapper').addClass('top-fixed');
                $('.site-heading-area').addClass('animated slideInDown');
            }
            $('.btntooltip .sub').addClass('t1');

        } else {
            if ($('.content-wrapper').hasClass('top-fixed')) {
                $('.content-wrapper').removeClass('top-fixed');
                $('.site-heading-area').removeClass('animated slideInDown');
            }
            $('.btntooltip .sub').removeClass('t1');
        }*/
        return false;
    });

    /*$('.productmodel').click(function(){
        $(this).addClass('hide');
    })*/

    $('#productmodel').click(function () {
        if ($('#thumbnails-mask li.active').length <= 0) {
            $('.productmodel').addClass('hide');
            return;
        }
        if ($('.detail #size .active').length > 0) {
            $('.productmodel[data-size="' + $('.detail #size .active').attr("size-id") + '"]').removeClass('hide');
        } else {
            $('.productmodel:eq(0)').removeClass('hide');
        }
    });

    $('#viewsizeguide').click(function () {
        $('.dlg-sizeguide').modal({
            'keyboard': true,
            'show': true
        });
    });

    $('.collapse-toogle>div:first-child').click(function (e) {
        e.preventDefault();
        if ($(this).parent().hasClass('in')) {
            $(this).parent().removeClass('in');
        } else {
            $('.collapse-toogle').removeClass('in');
            $(this).parent().addClass('in');
        }
        return false;
    });

    $('.designer-info .collapse-toogle a').click(function (e) {
        e.preventDefault();
        if ($(this).parent().hasClass('in')) {
            $(this).parent().removeClass('in');
        } else {
            $('.designer-info .collapse-toogle').removeClass('in');
            $(this).parent().addClass('in');
        }
        return false;
        //location.href = $(this).attr('href');
        //return false;
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('#size .box a').click(function () {
        $('#size .box').removeClass('active');
        $(this).parent().addClass('active');
        $('#size + .validator').addClass('hide');
        return false;
    });
    $('#color .box-color a').click(function () {
        $('#color .box-color').removeClass('active');
        $(this).parent().addClass('active');
        $('#thumbnails-mask li').removeClass('show').removeClass('active').addClass('hide');
        $('#thumbnails-mask li[color-id="' + $(this).parent().attr('color-id') + '"]').removeClass('hide').addClass('show');
        $('#thumbnails-mask li.show').eq(0).addClass('active');
        var w = $(window).width();
        if (w > 767) {
            var ez = $('.prod-image img').data('elevateZoom');
            ez.swaptheimage($('#thumbnails-mask li.show').eq(0).children('img').attr('data-image'), $('#thumbnails-mask li.show').eq(0).children('img').attr('data-zoom-image'));
        } else if ($('#thumbnails-mask li.show').eq(0).children('img').attr('data-image') != undefined &&
            $('#thumbnails-mask li.show').eq(0).children('img').attr('data-image') != null &&
            $('#thumbnails-mask li.show').eq(0).children('img').attr('data-image') != '') {
            $('.prod-image img').attr('src', $('#thumbnails-mask li.show').eq(0).children('img').attr('data-image'));
        }
        curentIndex = 0;
        if ($('#thumbnails-container ul li.show').length > 5) {
            $('#thumbnails-mask').css({
                'height': '520px'
            });
        } else {
            $('#thumbnails-mask').css({
                'height': 'auto'
            });
        }
        return false;
    });

    if ($('#thumbnails-mask').length > 0) {
        var delay = 500,
            setTimeoutConst;
        $('#thumbnails-mask > li').removeClass('show').removeClass('active').addClass('hide');
        $('#thumbnails-mask li[color-id="' + $('#color .box-color.active').attr('color-id') + '"]').removeClass('hide').addClass('show');
        $('#thumbnails-mask li.show').eq(0).addClass('active');
        //var ez = $('.prod-image img').data('elevateZoom');
        $('.prod-image img').attr('src', $('#thumbnails-mask li.show').eq(0).children('img').attr('data-image')).attr('data-zoom-image', $('#thumbnails-mask li.show').eq(0).children('img').attr('data-zoom-image'));

        $(window).resize(function () {
            var w = $(window).width();
            if (w > 767) {
                $('.prod-image img').elevateZoom({
                    cursor: "crosshair",
                    borderSize: 2,
                    borderColour: '#000',
                    lensColour: '#0388cd',
                    lensBorderColour: '#0388cd',
                    scrollZoom: false,
                    onZoomedImageLoaded: function () {
                        $('.zoomContainer').hover(function () {
                            setTimeoutConst = setTimeout(function () {
                                $('.prod-image .imageNav').removeClass('hide');
                            }, delay);
                        }, function (e) {
                            clearTimeout(setTimeoutConst);
                            if (!$(e.toElement).hasClass('icon-imgnext') && !$(e.toElement).hasClass('icon-imgprev')) {
                                $('.prod-image .imageNav').addClass('hide');
                            }
                        });
                    }
                });
            } else {
                $('.prod-image img').removeData('elevateZoom');
                $('.zoomWrapper img.zoomed').unwrap();
                $('.zoomContainer').remove();
            }
        });
        var w = $(window).width();
        if (w > 767) {
            $('.prod-image img').elevateZoom({
                cursor: "crosshair",
                borderSize: 2,
                borderColour: '#000',
                lensColour: '#0388cd',
                lensBorderColour: '#0388cd',
                scrollZoom: false,
                onZoomedImageLoaded: function () {
                    $('.zoomContainer').hover(function () {
                        setTimeoutConst = setTimeout(function () {
                            $('.prod-image .imageNav').removeClass('hide');
                        }, delay);
                    }, function (e) {
                        clearTimeout(setTimeoutConst);
                        if (!$(e.toElement).hasClass('icon-imgnext') && !$(e.toElement).hasClass('icon-imgprev')) {
                            $('.prod-image .imageNav').addClass('hide');
                        }
                    });
                }
            });
        }

        //ez.swaptheimage($('#thumbnails-mask li.show').eq(0).children('img').attr('data-image'), $('#thumbnails-mask li.show').eq(0).children('img').attr('data-zoom-image'));
        curentIndex = 0;
    }

    $('#order').change(function () {
        filter(false, true);
    });

    $('.record-number').click(function () {
        $('.record-number').removeClass('active');
        $(this).addClass('active');
        filter();
        return false;
    });

    $('.product-type li a').click(function () {
		$('.product-type li ul').addClass('hide');
        $('.product-type li a').removeClass('active');
		$(this).parent().find('ul').removeClass('hide');
        $('.product-type .checkbox').removeClass('checked');
        $(this).addClass('active');
        filter(false, true);
        return false;
    });

    $('.product-style li a').click(function () {
        $('.product-style li a').removeClass('active');
        $(this).addClass('active');
        filter();
        return false;
    });

    $('.btnflashsaleslot').click(function () {
        $('.btnflashsaleslot').removeClass('active');
        $(this).addClass('active');
        filter();
        return false;
    });

    $('.product-sale li a').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
        filter();
        return false;
    });

    $('.product-price .delete').click(function () {
        $('#txtPrice').val('0,10000000');
        //flgPriceSearch = false;
        filter(false, true);
    });

    $('.product-designer .delete').click(function () {
        $('.product-designer li .checkbox').removeClass('checked');
        filter(false, true);
    });

    $('.product-size .delete').click(function () {
        $('.product-size li .checkbox').removeClass('checked');
        filter(false, true);
    });

    validator();
    $('.btnReceiveEmail').click(function (e) {
        e.preventDefault();
        register_receive_email('.btnReceiveEmail');
        return false;
    });

    frmvalidator();
    $('.btnEmail').click(function (e) {
        e.preventDefault();
        register_email('.btnEmail');
        return false;
    });

    designvalidator();
    $('.btnBrandReceiveEmail').click(function (e) {
        e.preventDefault();
        register_receive_email('.btnBrandReceiveEmail');
        return false;
    });

    $('#txtBrandEmail').click(function (e) {
        e.preventDefault();
        return false;
    });

    $("#txtEmail").keypress(function (event) {
        if (event.which == 13) {
            event.preventDefault();
            register_receive_email('.btnReceiveEmail');
        }
    });

    $("#txtPopupVoucherEmail").keypress(function (event) {
        if (event.which == 13) {
            event.preventDefault();
            $('.btnReceiveVoucher').trigger("click");
        }
    });

    $("#txtBrandEmail").keypress(function (event) {
        if (event.which == 13) {
            event.preventDefault();
            register_receive_email('.btnBrandReceiveEmail');
        }
    });

    $('.btnaddproducttocart').click(function () {
        var param = {
            'product_id': $(this).attr('product_id'),
            'color_name': $(this).attr('color_name'),
            'image': $(this).attr('image'),
            'product_options': $(this).attr('product_options'),
            'description': $(this).attr('description'),
            'size_id': $(this).attr('size_id'),
            'category_name': $('.navigation>a:eq(1)').text()
        };
        addprodtocart(param);
    });

	$('.show-filter-category').click(function () {
		frontEnd.closeFilterMobile();
	});

    $('.btnaddtocart').click(function () {
        if ($('#size .active').length <= 0) {
            $('#size + .validator').removeClass('hide');
            return;
        }
        var param = {
            'product_id': $('#product_id').val(),
            'color_name': $('#color .active').attr('color-name'),
            'image': $('#thumbnails-mask li.active img').attr('src'),
            'product_options': '{"color":{"color_id":' + $('#color .active').attr('color-id') +
                ',"color_code":"' + $('#color .active').attr('color-code') + '"},"size":"' +
                $('#size .active a').html() + '"}',
            'size_id': $('#size .active').attr('size-id'),
            'description': '',
            'category_name': $('.navigation>a:eq(1)').text()
        };
        addprodtocart(param);
    });

    $('.btnaddtowishlist').click(function () {
        var param = {
            'product_id': $(this).attr('product_id'),
            'color_name': $(this).attr('color_name'),
            'product_name': $(this).attr('product_name'),
            'image': $(this).attr('image'),
            'brand_name': $(this).attr('brand_name'),
            'price': $(this).attr('price'),
            'alias': $(this).attr('alias'),
            'product_options': $(this).attr('product_options'),
            'size_id': $(this).attr('size-id'),
            'description': $(this).attr('description')
        };
        addtowishlist(param);
    });

    $('.btn-wishlist').click(function () {
        if ($('#size .active').length <= 0) {
            $('#size + .validator').removeClass('hide');
            return;
        }
        var param = {
            'product_id': $('#product_id').val(),
            'color_name': $('#color .active').attr('color-name'),
            'product_name': $('#product_name').html(),
            'image': $('#thumbnails-mask li.active img').attr('src'),
            'brand_name': $('#design_name').html(),
            'price': $('#price').val(),
            'alias': $('#txtAlias').val(),
            'product_options': '{"color":{"color_id":' + $('#color .active').attr('color-id') +
                ',"color_code":"' + $('#color .active').attr('color-code') + '"},"size":"' +
                ($('#size .active').length > 0 ? $('#size .active a').html() : $('#size label:first-child a').html()) + '"}',
            'size_id': $('#size .active').attr('size-id'),
            'description': ''
        };
        addtowishlist(param);
    });

    $('#lstwishlist .delete,.delete-wishlist').click(function () {
        var param = {
            'wishlistId': $(this).attr('wishlist-id'),
            'url': window.location.href
        };
        var method = 'post';
        var url = siteUrl + '/api/deletewishlist';
        var this1 = $(this);
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            data: $.param(param),
            success: function (data) {
                $("body").removeClass("loading");
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    if (data['wishlist'].length > 0) {
                        $(".prod-wish-qty").html('(' + data['wishlist'].length + ')');
                        $("#lstwishlist .sub").remove();
                        $("#lstwishlist").append(data['content']);
                    } else {
                        $(".prod-wish-qty").html('');
                        $("#lstwishlist .sub").remove();
                        $("#lstwishlist").append("");
                    }
                    this1.parents('tr').prev('tr').remove();
                    this1.parents('tr').remove();
                    /*$("body").removeClass("loading");
                    $('.dlg-notify').modal({'keyboard':true,'show':true});
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('Thực hiện xóa thành công!');
                    setTimeout(function()
                    {
                        location.reload();
                    },1000);*/
                } else if (data['login-url']) {
                    $("body").removeClass("loading");
                    location.href = data['login-url'];
                } else {
                    $("body").removeClass("loading");
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                    $('.dlg-notify').modal({
                        'keyboard': true,
                        'show': true
                    });
                }
            },
            error: function (xhr, err) {
                $("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
                $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
            }
        });
    });

    $('.delete-cart').click(function () {
        var self = this;
        var param = {
            'id': $(this).attr('item-id')
        };
        var method = 'post';
        var url = siteUrl + '/api/deletecart';
        var this1 = $(this);
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            data: $.param(param),
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    $("body").removeClass("loading");
                    /*$('.dlg-notify').modal({'keyboard':true,'show':true});
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('Thực hiện xóa thành công!');*/
                    dataLayer.push({
                        "event": "removeFromCart",
                        "ecommerce": {
                            "currencyCode": "VND",
                            "remove": {
                                "products": [data['product']]
                            }
                        }
                    });
					//-- ematic push
					frontEnd.ematicPush(data['items'], 'cart');
					//-- end ematic
                    if (this1.parents('.product-info-custom').length > 0) {
                        this1.parents('.product-info-custom').remove();
                    } else {
                        this1.parents('.delete-item').prev('.product-info-custom').remove();
                        this1.parents('.delete-item').remove();
                    }
                    // Reload current page if order item was deleted which is product obof campaign type.
                    var is_reload = $(self).attr('item-obof') == 'Y' ? true : false;
                    is_reload = $(self).attr('item-force-reload') == 'Y' ? true : false;
                    updatecart(param, this, is_reload);
                    /*setTimeout(function()
                    {
                        location.reload();
                    },1000);*/
                } else if (data['login-url']) {
                    $("body").removeClass("loading");
                    location.href = data['login-url'];
                } else {
                    $("body").removeClass("loading");
                    $('.dlg-notify .modal-title').html('Thông báo');
                    $('.dlg-notify .modal-body').html('<span class="color-red">' + data['error'] + '</span>');
                    $('.dlg-notify').modal({
                        'keyboard': true,
                        'show': true
                    });
                }
            },
            error: function (xhr, err) {
                $("body").removeClass("loading");
                $('.dlg-notify .modal-title').html('Thông báo');
                $('.dlg-notify').modal({
                    'keyboard': true,
                    'show': true
                });
                $('.dlg-notify .modal-body').html('<span class="color-red">' + formatErrorMessage(xhr, err) + '</span>');
            }
        });
    });

    $('.delete--cart-xs').on('click', function () {
        var self = this;
        var delete_selector = $(self).attr('item-relate');
        if (delete_selector) {
            $('#' + delete_selector).attr('item-force-reload', 'Y');
            $('#' + delete_selector).trigger('click');
        }
    });

    validatorReceiveVoucher();
    $('.btnReceiveVoucher').click(function () {
        $('.frmReceiveVoucher').bootstrapValidator('validate');
        if ($('.frmReceiveVoucher').data('bootstrapValidator').isValid() == true) {
            var param = {
                'email': $.trim($('#txtPopupVoucherEmail').val())
            };
            var method = 'post';
            var url = siteUrl + '/api/receivevoucher';
            $("body").addClass("loading");
            $.ajax({
                url: url,
                type: method,
                cache: false,
                contentType: 'application/x-www-form-urlencoded',
                dataType: 'json',
                data: $.param(param),
                success: function (data) {
                    if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                        $('#popupVoucherCode').html(data['code']);
                        $('#popupVoucherRequest').addClass('hide');
                        $('#popupVoucherResponse').removeClass('hide');
                        $('.box-label-alert-registerrevicevoucher').addClass('hide');
                        $("body").removeClass("loading");
                        var email = param.email;

                        /*var mergeVars = {
                            groupings: [{
                                name: "User Type",
                                groups: ["API Integration"]
                            }]
                        }

                        ematics("subscribe", "a609eb301e", email, mergeVars, function (e) {
                            if (e["error"] == 0) {
                                // Success
                            } else {
                                // Error
                                // console.log(e["errorMessage"])
                            }
                        });*/

						var mergeVars = {
							"COUPON": data['code']
						};
						ematics("subscribe","", email, mergeVars, function(e){
							if (e["error"] == 0) {
								// Success
							} else {
								// Error
								// console.log(e["errorMessage"])
							}
						});

                        setTimeout(function () {
                            $('.dlg-voucher').modal('hide');
                        }, 10000);
                    } else {
                        $("body").removeClass("loading");
                        $('.box-label-alert-registerrevicevoucher').removeClass('hide');
                    }
                },
                error: function (xhr, err) {
                    $("body").removeClass("loading");
                    $('.box-label-alert-registerrevicevoucher').removeClass('hide');
                }
            });
        }
    });
    registervalidator();
    registercooperationvalidator();
    purchasenotaccount();
    //changeoptaddress();
    //caculatorgrandamount();
    changegiftcardprice();
    $('.slcprice').change(function () {
        changegiftcardprice();
    });
    $('#txtCouponCode').focus(function () {
        $(this).removeClass('lostfocus').addClass('focus');
    });
    $('.txtCouponCode').focus(function () {
        $(this).removeClass('lostfocus').addClass('focus');
    });
    $('#txtCouponCode').blur(function () {
        if ($.trim($(this).val()) == '') {
            $(this).removeClass('focus').addClass('lostfocus', {
                duration: 5000
            });
        }
    });
    $('.txtCouponCode').blur(function () {
        if ($.trim($(this).val()) == '') {
            $(this).removeClass('focus').addClass('lostfocus', {
                duration: 5000
            });
        }
    });

    $('.optaddress').change(function () {
        changeoptaddress();
    });
    giftcardvalidator();

    $('#btnRegister').click(function () {
        $('#txtgender').val($('#frmregister .gender .opt-checkbox.checked').data('gender'));
        $('#txtreceive_promotion').val($('#receive_promotion').hasClass('checked') ? 'Y' : 'N');
        $('#txtreceive_product').val($('#receive_product').hasClass('checked') ? 'Y' : 'N');
    });
    if ($('#thumbnails-container ul li.show').length > 5) {
        $('#thumbnails-mask').css({
            'height': '520px'
        });
    } else if ($('#thumbnails-container ul li.show').length > 0) {
        $('#thumbnails-mask').css({
            'height': 'auto'
        });
    }
    /*$('.btnsearch').click(function(){
        if($.trim($('#txtSearch').val())=='')
        {
            location.href = siteUrl;
        }
    });*/
    var isMobile = false; //initiate as false
    // device detection
    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
        isMobile = true;
    }
    if (!isMobile) {
        $(".prod-img2")
            .hover(function () {
                var this1 = this;
                var length = $(this1).find("img").length;
                if (length > 1) {
                    showImage = setInterval(function () {
                        var notHide = $(this1).find("img:not('.hide')");
                        var indexShow = notHide.index();
                        if (indexShow >= length - 1) {
                            indexShow = 0;
                        } else {
                            indexShow++;
                        }
                        console.log(indexShow);
                        notHide.addClass('hide');
                        $(this1).find('img:eq(' + (indexShow) + ')').removeClass('hide');
                    }, 500);
                }
            }, function () {
                var this1 = this;
                var length = $(this1).find("img").length;
                if (length > 1) {
                    clearInterval(showImage);
                    var this1 = this;
                    $(this1).find("img:not(':eq(0)')").addClass('hide');
                    $(this1).find("img:eq(0)").removeClass('hide');
                }
            });
    }

    $('.ld-product-type span.upcase').click(function (e) {
        e.stopPropagation();
        var this1 = $(this);
        var param = {};
        var flgActive = this1.hasClass('active');
        if (!flgActive) {
            param = {
                'tag': this1.data('tag'),
                'landing_slot_id': this1.data('landing_slot_id'),
                'page': 1,
                'routeid': $('#txtRouteId').val()
            };
        } else {
            param = {
                'tag': '',
                'landing_slot_id': this1.data('landing_slot_id'),
                'page': 1,
                'routeid': $('#txtRouteId').val()
            };
        }
        var method = 'post';
        var url = siteUrl + '/api/landingpageproducts';
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            data: $.param(param),
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    if (flgActive) {
                        this1.removeClass('active');
                    } else {
                        this1.parents('.box-landing').find('.ld-product-type span.active').removeClass('active');
                        this1.addClass('active');
                    }
                    if (data['nextPage'] > 0) {
                        this1.parents('.box-landing').find('.btn-ld-loadmore').removeClass('hide');
                        this1.parents('.box-landing').find('.btn-ld-loadmore').data('page', data['nextPage']);
                    } else {
                        this1.parents('.box-landing').find('.btn-ld-loadmore').addClass('hide');
                    }
                    this1.parents('.prod-list').find('.ld-products').html(data['content']);
                    $("body").removeClass("loading");
                    lazyload();
                }
            },
            error: function (xhr, err) {
                $("body").removeClass("loading");
            }
        });
    });

    $('.box-landing .btn-ld-loadmore').click(function (e) {
        e.stopPropagation();
        var this1 = $(this);
        var param = {};
        var ldProductTypeActive = this1.parents('.box-landing').find('.ld-product-type span.active');
        var ldProductType = this1.parents('.box-landing');
        if (ldProductTypeActive.length) {
            param = {
                'tag': ldProductTypeActive.data('tag'),
                'landing_slot_id': ldProductTypeActive.data('landing_slot_id'),
                'page': this1.data('page'),
                'routeid': $('#txtRouteId').val()
            };
        } else {
            param = {
                'tag': '',
                'landing_slot_id': ldProductType.find('.ld-product-type span:first-child').data('landing_slot_id'),
                'page': this1.data('page'),
                'routeid': $('#txtRouteId').val()
            };
        }
        var method = 'post';
        var url = siteUrl + '/api/landingpageproducts';
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            data: $.param(param),
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    this1.parents('.box-landing').find('.ld-products').append(data['content']);
                    if (data['nextPage'] > 0) {
                        this1.removeClass('hide');
                        this1.data('page', data['nextPage']);
                    } else {
                        this1.addClass('hide');
                    }
                    lazyload();
                    $("body").removeClass("loading");
                }
            },
            error: function (xhr, err) {
                $("body").removeClass("loading");
            }
        });
    });


    $('.btn-collection').click(function (e) {
        e.stopPropagation();
        var this1 = $(this);
        var flgActive = this1.hasClass('active');
        var params = filter(true);
        params.push('routeid=' + $('#txtRouteId').val());
        params.push('designerid=' + this1.data('designer-id'));
        params.push('page=1');
        if (!flgActive) {
            params.push('collection=' + this1.data('id'));
        }
        var method = 'post';
        var url = siteUrl + '/api/designerproducts?' + params.join('&');
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    if (flgActive) {
                        this1.removeClass('active');
                    } else {
                        $('.btn-collection').removeClass('active');
                        this1.addClass('active');
                    }
                    if (data['nextPage'] > 0) {
                        this1.parents('.box-products').find('.btn-ld-loadmore').removeClass('hide');
                        this1.parents('.box-products').find('.btn-ld-loadmore').data('page', data['nextPage']);
                    } else {
                        this1.parents('.box-products').find('.btn-ld-loadmore').addClass('hide');
                    }
                    this1.parents('.box-products').find('.ds-products').html(data['content']);
                    $("body").removeClass("loading");
                }
            },
            error: function (xhr, err) {
                $("body").removeClass("loading");
            }
        });
    });

    $('.box-products .btn-ld-loadmore').click(function (e) {
        e.stopPropagation();
        var this1 = $(this);
        var params = filter(true);
        params.push('routeid=' + $('#txtRouteId').val());
        params.push('designerid=' + this1.data('designer-id'));
        params.push('page=' + this1.data('page'));
        if (this1.parents('.box-products').find('.btn-collection').length) {
            params.push('shoplooks=1');
        }
        if (this1.parents('.box-products').find('.btn-collection.active').length) {
            params.push('collection=' + this1.parents('.box-products').find('.btn-collection.active').data('id'));
        }

        var method = 'post';
        var url = siteUrl + '/api/designerproducts?' + params.join('&');
        $("body").addClass("loading");
        $.ajax({
            url: url,
            type: method,
            cache: false,
            contentType: 'application/x-www-form-urlencoded',
            dataType: 'json',
            success: function (data) {
                if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                    this1.parents('.box-products').find('.ds-products').append(data['content']);
                    if (data['nextPage'] > 0) {
                        this1.removeClass('hide');
                        this1.data('page', data['nextPage']);
                    } else {
                        this1.addClass('hide');
                    }
                    $("body").removeClass("loading");
                }
            },
            error: function (xhr, err) {
                $("body").removeClass("loading");
            }
        });
    });

    $('#register-cooperation').click(function (e) {
        e.stopPropagation();
        $('#frmregistercooperation').bootstrapValidator('validate');
        if ($('#frmregistercooperation').data('bootstrapValidator').isValid() == true) {
            var method = 'post';
            var url = siteUrl + '/api/registercooperation';
            $("body").addClass("loading");
            $.ajax({
                url: url,
                type: method,
                cache: false,
                contentType: 'application/x-www-form-urlencoded',
                dataType: 'json',
                data: $("#frmregistercooperation").serialize(),
                success: function (data) {
                    if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
                        $('#register-success').removeClass('hide');
                        $('#register-tag').addClass('hide');
                        $('#register-link').addClass('hide');
                        $("body").removeClass("loading");
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                    }
                },
                error: function (xhr, err) {
                    $("body").removeClass("loading");
                }
            });
        }
    });

	$('#slcProvine').change(function (e) {
		e.stopPropagation();

		var dataPost = {
			'province_id': $(this).val()
		};
		var method = 'post';
		var url = siteUrl + '/api/districts';
		$.ajax({
			url: url,
			type: method,
			cache: false,
			contentType: 'application/x-www-form-urlencoded',
			dataType: 'json',
			data: dataPost,
			success: function (data) {
				if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
					$("#slcDistrict").html(data['content']);
					$("#slcDistrict").select2();
				}
			},
			error: function (xhr, err) {

			}
		});
	});

	function loadDistrictByProvince(){
		var dataPost = {
			'province_id': $('#slcProvine').val(),
			'district_id': districtId
		};
		var method = 'post';
		var url = siteUrl + '/api/districts';
		$.ajax({
			url: url,
			type: method,
			cache: false,
			contentType: 'application/x-www-form-urlencoded',
			dataType: 'json',
			data: dataPost,
			success: function (data) {
				if (data['error'] == undefined || data['error'] == null || data['error'] == '') {
					if(data['content']){
						$("#slcDistrict").html(data['content']);
						$("#slcDistrict").select2();
					}
				}
			},
			error: function (xhr, err) {

			}
		});
		return false;
	}

	if ($.urlParamsConfig('shipping.html') != null) {
		loadDistrictByProvince();
	}

    if (typeof countdown != 'undefined' && $('#countdowntimer').length) {
        var x = setInterval(function () {
            countdown--;
            var days = Math.floor(countdown / (60 * 60 * 24));
            var hours = Math.floor((countdown % (60 * 60 * 24)) / (60 * 60));
            var minutes = Math.floor((countdown % (60 * 60)) / (60));
            var seconds = Math.floor(countdown % (60));
            $('#countdowntimer').html('');
            if (days > 0) {
                $('#countdowntimer').append('<div><span class="days">' + days.toString().padStart(2, '0') + '</span><div class="smalltext">Ngày</div></div>');
            }
            $('#countdowntimer').append('<div><span class="hours">' + hours.toString().padStart(2, '0') + '</span><div class="smalltext">Giờ</div></div>');
            $('#countdowntimer').append('<div><span class="minutes">' + minutes.toString().padStart(2, '0') + '</span><div class="smalltext">Phút</div></div>');
            $('#countdowntimer').append('<div><span class="seconds">' + seconds.toString().padStart(2, '0') + '</span><div class="smalltext">Giây</div></div>');
            if (countdown < 0) {
                clearInterval(x);
                location.reload();
            }
        }, 1000);
    }

    // BLACK FRIDAY

    if (typeof countdown != 'undefined' && $('#countdownclock').length) {
        var x = setInterval(function () {
            countdown--;
            var days = Math.floor(countdown / (60 * 60 * 24));
            var hours = Math.floor((countdown % (60 * 60 * 24)) / (60 * 60));
            var minutes = Math.floor((countdown % (60 * 60)) / (60));
            var seconds = Math.floor(countdown % (60));
            $('#countdownclock').html('');
            if (days > 0) {
                $('#countdownclock').append('<div class="fl" style="margin-right: 15px"><span class="days">' + days.toString().padStart(2, '0') + '</span><div class="smalltext">Ngày</div></div>');
            }
            $('#countdownclock').append('<div class="fl"><span class="hours">' + hours.toString().padStart(2, '0') + '</span><div class="smalltext">Giờ</div></div>');
            $('#countdownclock').append('<div><span class="minutes">' + minutes.toString().padStart(2, '0') + '</span><div class="smalltext">Phút</div></div>');
            $('#countdownclock').append('<div class="fr"><span class="seconds">' + seconds.toString().padStart(2, '0') + '</span><div class="smalltext">Giây</div></div>');
            if (countdown < 0) {
                clearInterval(x);
                location.reload();
            }
        }, 1000);
    }

});
