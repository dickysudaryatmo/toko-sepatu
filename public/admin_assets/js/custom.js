var baseUrl = window.location.origin + '/';
var app={
    init: function init() {
        app.table.init();
        app.ajax.init();
        app.form.init();
    },
    table : {
        init:function(){
            // console.log('masuk1')
            if ($('#tableProduk').length) {
                // console.log('produk')
                var column = [
                    {'data':null},
                    {'data':'brand_id'},
                    {'data':'name'},
                    {'data':'price'},
                    {'data':'description'},
                    {'data':null},
                ];
                columnDefs = [
                    {
                        "targets": 0,
                        "data": null,
                        "render": function(data, type, full, meta){
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "targets": 5,
                        "data": "id",
                        "render": function(data, type, full, meta){
                            console.log(full.id)
                            var id = encodeURIComponent(window.btoa(full.id));

                            var data = '<div class="action-table">'+
                                            '<a href="/edit-produk/' + id + '">' +
                                                '<div class="glyphicon glyphicon-pencil">'+
                                                    '<i class="fas fa-pen-square"></i>'+
                                                '</div>'+
                                            '</a>'+
                                        '</div>';
                                return data;
                        }
                    }
                ];
                app.table.serverSide('tableProduk',column,'produk',null,columnDefs);
            }
        },
        getData:function(url,params,callback){
            $.ajax({
                url:url,
                type:'post',
                data:params,
                success:function(result){
                    if(!result.error){
                        callback(null,result.data);
                    }else{
                        callback(data);
                    }
                }
            })
        },
        serverSide:function(id,columns,url,custParam=null,columnDefs=null){
            // console.log(id, columns, url)
            var urutan = [0, 'asc'];
            if (id == 'tableProduct') {
                urutan = [1, 'asc'];
            }
    
            var search = true;
            if (id == 'tableRekapPoint' || id == 'tableRekapSaldo' || id == 'tableSlider') {
                search = false;
            }
    
            var svrTable = $("#"+id).DataTable({
                // processing:true,
                serverSide:true,
                columnDefs:columnDefs,
                columns:columns,
                // responsive: true,
                scrollX: true,
                // scrollY: true,
                ajax:function(data, callback, settings){
                    data.param = custParam
                    app.ajax.getData(url,'post',data,function(result){
                        console.log(result)
                        if(result.status=='reload'){
                            ui.popup.show('confirm',result.messages.title,result.messages.message,'refresh');
                        }else if(result.status=='logout'){
                            ui.popup.alert(result.messages.title,result.messages.message,'logout');
                        }else{
                            if (id == 'tableEndUserReport') {
                                $('#totalAmountDate').html('Rp '+result.total_amount)
                            }
                            
                            callback(result);
                        }
                    })
                },
                bDestroy: true,
                searching:search,
                order:urutan,
                ordering:true,
            })
            console.log(svrTable)
            $('div.dataTables_filter input').unbind();
            $('div.dataTables_filter input').bind('keyup', function (e) {
                if (e.keyCode == 13){
                    svrTable.search(this.value).draw();
                }
            });
        },
    },
    ajax: {
        init: function init() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function beforeSend(jxqhr) {
                    ui.popup.showLoader();
                },
                timeout: 30000,
                error: function error(event, jxqhr, status, _error) {
                    ui.popup.show('error', 'Sedang Gangguan Jaringan', 'Error');
                    ui.popup.hideLoader();	
                },
                complete: function complete() {
                },
                global: true
            });
        },
        getData: function getData(url, method, params, callback) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (params == null) {
                params = {};
            }
            $.ajax({
                type: method,
                url: baseUrl + url,
                data: params,
                success: function success(result) {
                    // ui.popup.hideLoader();
                    if (result.status == 'success') {
                        ui.popup.hideLoader();
                        if (result.callback == 'redirect') {
                            ui.popup.show(result.status, result.message, result.url);
                        }
                    }
                    if (result.status == 'error') {
                        ui.popup.show('error', result.messages.message, result.messages.title);
                    } else if (result.status == 'reload') {
                        ui.popup.alert(result.messages.title, result.messages.message, 'refresh');
                    } else if (result.status == 'logout') {
                        ui.popup.alert(result.messages.title, result.messages.message, 'logout');
                    } else if (result == 401) {
                        ui.popup.show('warning', 'Sesi Anda telah habis, harap login kembali', 'Session Expired')					
                        if ($('.toast-warning').length == 2) {
                            $('.toast-warning')[1].remove();
                        }
                        setInterval(function() {
                            window.location = '/logout'
                        }, 3000); 
                    } else {
                        if (result instanceof Array || result instanceof Object) {
                            callback(result);
                        } else {
                            callback(JSON.parse(result));
                        }
                    }
                }
            });
        },
        submitData: function submitData(url, data, form_id) {
            other.encrypt(data, function (err, encData) {
                if (err) {
                    callback(err);
                } else {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: encData,
                        error: function error(jxqhr, status, _error2) {
                            ui.popup.hideLoader();
                            ui.popup.show('error', _error2, 'Error');
                        },
                        success: function success(result, status) {
                            if (result == null) {
                                ui.popup.show(result.status, 'Error');
                                ui.popup.hideLoader();
                            } else if (result == 401) {
                                ui.popup.show('warning', 'Sesi anda habis, mohon login kembali', 'Session Expired')
                                ui.popup.hideLoader();
                                setInterval(function() {
                                    window.location = '/logout'
                                }, 3000);
                            } else {
                                if (result.status == 'success') {
                                    $('.modal').modal('hide');
                                    ui.popup.hideLoader();
                                    if (result.callback == 'redirect') {
                                        console.log(result.url);
                                        ui.popup.show(result.status, result.message, result.url);
                                    }else if(result.callback == 'download'){
                                        $('.modal').modal('hide');
                                        $('#otorisasiBackup').val('');
                                        location.reload(); 
                                    }else if(result.callback == 'login'){
                                        // ui.toast.show();
                                        setInterval(function(){window.location = result.url;}, 2000);
                                    }else if (result.callback == 'editProfil') {
                                        ui.popup.show(result.status, result.message);
                                        setInterval(function(){location.reload();}, 2000); 
                                    }else if (result.callback == 'forget-password') {
                                        $("#modalForgetPassword").modal('hide')
                                        $("#modalSuccessForgetPassword").modal('show')
                                    }else if (result.callback == 'change-password') {
                                        $("#newPassChange").val(result.data.newPass)
                                        $("#emailChange").val(result.data.email)

                                        $("#modalOtpChange").modal('show')
                                    }else if (result.callback == 'change-telfon') {
                                        $("#modalEditHp").modal('hide')
                                        ui.popup.show(result.status, result.message);
                                    }else if (result.callback == 'success-create-password') {
                                        // ui.popup.show(result.status, result.message);
                                        setInterval(function(){window.location = result.url;}, 2000);
                                    }
                                }else if(result.status == 'info'){
                                    ui.popup.hideLoader();
                                    if(result.callback == "inqSales"){
                                        $('#inqTotalBeli').empty();

                                        $('#detailSales').removeClass('hidden');
                                        ui.popup.show(result.status, result.message);

                                        var total = '';		
                                        var angkarevTotal = result.data.toString().split('').reverse().join('');
                                        for(var i = 0; i < angkarevTotal.length; i++) if(i%3 == 0) total += angkarevTotal.substr(i,3)+'.';

                                        $('#inqTotalBeli').html(total.split('',total.length-1).reverse().join(''));
                                        $('#metodePembayaran').change(function(){
                                            var valueMetode = $('#metodePembayaran').val();

                                            if (valueMetode == '2') {
                                                $('#labelBuktTransfer').removeClass('hidden');
                                                $('#imageBukti').prop("disabled", false);
                                            }else{
                                                $('#labelBuktTransfer').addClass('hidden');
                                                $('#gambarBukti').addClass('hidden');
                                                $('#imageBukti').prop("disabled", true);
                                            }
                                        })
                                    }
                                }else if(result.status == 'warning'){
                                    ui.popup.hideLoader();
                                    if (result.callback == 'redirect') {
                                        ui.popup.show(result.status, result.message, result.url);
                                    }
                                }else{
                                    if(result.messages == '<p>Error: Validation</p>') {
                                        ui.popup.hideLoader();
                                        // $("#"+form_id).validate().showErrors(result.errors);
                                        ui.popup.show(result.status, "Harap cek isian");
                                    }else if(result.callback == 'errorInq'){
                                        ui.popup.show(result.status, result.message);
                                        ui.popup.hideLoader();
                                        $('#divInq').addClass('hidden');
                                    }else{
                                        ui.popup.show(result.status, result.message);
                                        ui.popup.hideLoader();
                                    }
                                }
                            }
                        }
                    });
                }
            });
        },
        submitImage: function submitImage(url, form_id, path, to_id) {}
    },
    form: {
        init: function init() {
			$('form').attr('autocomplete', 'off');

			// $.validator.addMethod("lettersonly", function (value, element) {
			// 	return this.optional(element) || /^[a-z]+$/i.test(value);
			// }, "Letters only please");

			// $.validator.addMethod("regexp", function (value, element, regexpr) {
			// 	return regexpr.test(value);
			// }, "");
			// $.each($('form'), function (key, val) {
			// 	$(this).validate(formrules[$(this).attr('id')]);
			// });

			$('form').submit(function (e) {
				e.preventDefault();
				var form_id = $(this).attr('id');
				// app.form.validate(form_id);
                // (form_id);
                app.form.submit(form_id)
			});
		},
		submit: function submit(form_id) {
            console.log(form_id)
			var form = $('#' + form_id);
			var url = form.attr('action');
			// var ops = formrules[form_id];
			// if (ops == null) {
			// 	ops = {};
			// }
			var i = 1;
			var input = $('.form-control');
			form;
			var data = form.serialize();
			var isimage = form.attr('foto');
			var isajax = form.attr('ajax');
			var isFilter = form.attr('filter');
			var isappend = form.attr('appendx');
			if (form_id == 'bukarekform') {
				$('#depositNewTab').removeClass('hidden');
			}
			if (isajax == 'true') {
				if (form_id == 'payform') {
					form_id = $('#' + form_id).attr('for');
				}
				console.log(url, data, form_id);
				// alert(data);
				app.ajax.submitData(url, data, form_id);
			} else if (isappend == 'true') {
				if (form_id == 'payform') {
					form_id = $('#' + form_id).attr('for');
				}
				console.log(url, data, form_id);
				// alert(data);
				app.ajax.submitData(url, data, form_id);
			} else if (isFilter == 'true') {
				console.log(form_id);
				app.table.filter(form_id, data);
			} else if (form_id == 'submitFormAddTicket' || form_id == 'post_reply' || form_id == 'form_due_diligence' || form_id == 'bukarekform' || form_id == 'upload_form') {
				var fd = new FormData($('#' + form_id)[0]);
				console.log(...fd, 'tes');
				// ui.popup.hideLoader();
				app.ajax.submitImage(url, fd, form_id);
			} else {
				console.log('masuk sinix');
				// ui.popup.showLoader();
				// (url);
				// app.encrypt(data, function (err, encData) {
				// 	console.log(data);
				// 	if (err) {
				// 		callback(err);
				// 	} else {
				// 		console.log('masuk xzx')
				// 		var encryptedElement = $('<input type="hidden" name="data" />');
				// 		$(encryptedElement).val(encData['data']);

				// 		form.find('select,input:not("input[type=file],input[type=hidden][name=_token],input[name=captcha]")').end().append(encryptedElement).click().unbind('submit').submit();
				// 	}
                // });
                form.find('select,input:not("input[type=file],input[type=hidden][name=_token],input[name=captcha]")').end().append().click().unbind('submit').submit();
			}
		}
	},
}
$(document).ready(function () {
	app.init();
    function readFileImageProduk(input) {
        console.log(input.files, input.files[0])
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                var imgPreview = '<img width="144" src="' + e.target.result + '" />';
                var labelPreview = $(input).parent().find('.label-preview')
                var imgPreviewZone = $(input).parent().parent().find('#imgProdukPreview');

                imgPreviewZone.empty();
                labelPreview.text(input.files[0].name)
                imgPreviewZone.append(imgPreview);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageProduk").change(function(){
        readFileImageProduk(this);
    });

        $("#addMore").click(function(e) {
            e.preventDefault();
            $("#varian").append("<div class='row'><div class='col-lg-4'><div class='form-group'><label for='stokProduk'>Stock</label><input type='text' class='form-control' name='stokProduk[]' id='stokProduk'></div></div>"+"<div class='col-lg-4'><div class='form-group'><label for='stokProduk'>Ukuran</label><br><input type='text' class='form-control' name='ukuran[]' id='ukuran'></div></div>"+"<div class='col-lg-4'><div class='form-group'><label for='stokProduk'>Warna</label><br><input type='text' class='form-control' name='warna[]' id='warna'></div></div></div><br>");
        });
});
