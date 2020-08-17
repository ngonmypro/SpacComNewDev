function checkKey(n){

  if (window.event.keyCode == 13){ //Enter
	  if( (n=="username") && ($('#username').val() != '') ){
		//alert("test enter");
		$('#password').focus();
	  }
	  if( (n=="password") && ($('#password').val() !='' ) ){
		//alert(n);
		checkuser();
	  }
	  //schstock();
  }else{
	  $('#pp').html('');
  }
}

function checkuser(){
	// alert('test');
	var username = $('#username').val();
	var password = $('#password').val();
	var data = "username=" + username + "&password=" + password;
	// alert(data);
	$('#pp').html("<img src='../../images/loading.gif' height='40' width='40' /> <br> Loading...");

	$.ajax({
		type: "POST",
		url: "chk_login.php",
		cache: false,
		data: data,
		success: function(msg){
			// alert(msg);
			if(msg=='Y'){
				//alert(msg);
				window.location.href = "../../index.php";
			// }else if (msg=='N') {
				// window.location.href = "cupong.php";
				//$('#contant').load('input_cupong.php');
			}else{
				$('#username').focus();
				$('#username').select();
				$("#pp").html(msg);
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
}

function logoutuser(){
	$.ajax({
		type: "POST",
		url: "modul/login/chk_logout.php",
		cache: false,
		data: "",
		success: function(msg){
			//alert(msg);
			if(msg!='Y'){
				window.location.href = "index.php";
			}else{
				//
			}
		},
		error: function(){
			//
		},
		complete: function(){
			//
		}
	});
}

function backindex() {
  window.location.href = "../../index.php";
}


// Start Modul Main Data

	// Start Chipset

	function LoadChip() {
		$("#content").load("modul/maindata/chipset/view/show_data.php");
	}

  function AddChip(ChipStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Chipset',
  		message: $('<div></div>').load('modul/maindata/chipset/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddChipPro(ChipStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddChipPro(ChipStatus) {
    var add_chip_name = $("#add_chip_name").val();
    var add_chip_type = $("#add_chip_type").val();

    var data = "add_chip_name=" + add_chip_name + "&add_chip_type=" + add_chip_type + "&ChipStatus=" + ChipStatus;

    if (add_chip_name != "" && add_chip_type != 0) {
      $.ajax({
					type: "POST",
					url: "modul/maindata/chipset/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadChip();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditChip(ChipId, ChipStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Chipset',
  		message: $('<div></div>').load('modul/maindata/chipset/view/from_edit_data.php',{ChipId:ChipId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieChipPro(ChipId, ChipStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieChipPro(ChipId, ChipStatus) {
    var edit_chip_name = $("#edit_chip_name").val();
    var edit_chip_type = $("#edit_chip_type").val();
    var edit_chip_status = "";

    if ($("#edit_chip_status1").is(':checked')) {
      edit_chip_status = 1;
    }else if ($("#edit_chip_status0").is(':checked')) {
      edit_chip_status = 0;
    }

    var data = "edit_chip_name=" + edit_chip_name + "&edit_chip_type=" + edit_chip_type + "&edit_chip_status=" + edit_chip_status + "&ChipId=" +  ChipId + "&ChipStatus=" + ChipStatus;
    // alert(data);
      if (edit_chip_name != '' && edit_chip_type != 0) {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/chipset/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadChip();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelChip(ChipId, ChipName, ChipStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Chipset',
  			message: "Confirm delete Chipset : " + ChipName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "ChipId=" + ChipId + "&ChipStatus=" + ChipStatus;
  					$.ajax({
  						  url: "modul/maindata/chipset/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadChip();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End chipset

  // Start Series

  function LoadSeries() {
		$("#content").load("modul/maindata/series/view/show_data.php");
	}

  function AddSeries(SeriesStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Series',
  		message: $('<div></div>').load('modul/maindata/series/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddSeriesPro(SeriesStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddSeriesPro(SeriesStatus) {
    var add_series_name = $("#add_series_name").val();
    var add_series_chip = $("#add_series_chip").val();

    var data = "add_series_name=" + add_series_name + "&add_series_chip=" + add_series_chip + "&SeriesStatus=" + SeriesStatus;

    if (add_series_name != "" && add_series_chip != 0) {
      $.ajax({
					type: "POST",
					url: "modul/maindata/series/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadSeries();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditSeries(SeriesId, SeriesStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Series',
  		message: $('<div></div>').load('modul/maindata/series/view/from_edit_data.php',{SeriesId:SeriesId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieSeriesPro(SeriesId, SeriesStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieSeriesPro(SeriesId, SeriesStatus) {
    var edit_series_name = $("#edit_series_name").val();
    var edit_series_chip = $("#edit_series_chip").val();
    var edit_series_status = "";

    if ($("#edit_series_status1").is(':checked')) {
      edit_series_status = 1;
    }else if ($("#edit_series_status0").is(':checked')) {
      edit_series_status = 0;
    }

    var data = "edit_series_name=" + edit_series_name + "&edit_series_chip=" + edit_series_chip + "&edit_series_status=" + edit_series_status + "&SeriesId=" + SeriesId + "&SeriesStatus=" + SeriesStatus;

      if (edit_series_name != '' && edit_series_chip != 0) {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/series/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadSeries();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelSeries(SeriesId, SeriesName, SeriesStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Series',
  			message: "Confirm delete Series : " + SeriesName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "SeriesId=" + SeriesId + "&SeriesStatus=" + SeriesStatus;
  					$.ajax({
  						  url: "modul/maindata/series/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadSeries();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Series


  // Start Series

  function LoadSocket() {
		$("#content").load("modul/maindata/socket/view/show_data.php");
	}

  function AddSocket(SocketStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Socket',
  		message: $('<div></div>').load('modul/maindata/socket/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddSocketPro(SocketStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddSocketPro(SocketStatus) {
    var add_socket_name = $("#add_socket_name").val();
    var add_socket_chip = $("#add_socket_chip").val();
    var add_socket_type = $("#add_socket_type").val();

    var data = "add_socket_name=" + add_socket_name + "&add_socket_chip=" + add_socket_chip + "&add_socket_type=" + add_socket_type + "&SocketStatus=" + SocketStatus;

    if (add_socket_name != "" && add_socket_chip != 0) {
      $.ajax({
					type: "POST",
					url: "modul/maindata/socket/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadSocket();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditSocket(SocketId, SocketStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Socket',
  		message: $('<div></div>').load('modul/maindata/socket/view/from_edit_data.php',{SocketId:SocketId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieSocketPro(SocketId, SocketStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieSocketPro(SocketId, SocketStatus) {
    var edit_socket_name = $("#edit_socket_name").val();
    var edit_socket_chip = $("#edit_socket_chip").val();
    var edit_socket_type = $("#edit_socket_type").val();
    var edit_socket_status = "";

    if ($("#edit_socket_status1").is(':checked')) {
      edit_socket_status = 1;
    }else if ($("#edit_socket_status0").is(':checked')) {
      edit_socket_status = 0;
    }

    var data = "edit_socket_name=" + edit_socket_name + "&edit_socket_chip=" + edit_socket_chip + "&edit_socket_type=" + edit_socket_type + "&edit_socket_status=" + edit_socket_status + "&SocketId=" + SocketId + "&SocketStatus=" + SocketStatus;

      if (edit_socket_name != '' && edit_socket_chip != 0) {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/socket/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadSocket();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelSocket(SocketId, SocketName, SocketStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Socket',
  			message: "Confirm delete Socket : " + SocketName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "SocketId=" + SocketId + "&SocketStatus=" + SocketStatus;
  					$.ajax({
  						  url: "modul/maindata/socket/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadSocket();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Socket

  // Start Brand

  function LoadBrand() {
		$("#content").load("modul/maindata/brand/view/show_data.php");
	}

  function AddBrand(BrandStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Brand',
  		message: $('<div></div>').load('modul/maindata/brand/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddBrandPro(BrandStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddBrandPro(BrandStatus) {
    var add_brand_name = $("#add_brand_name").val();
    var add_brand_type = $("#add_brand_type").val();

    var data = "add_brand_name=" + add_brand_name + "&add_brand_type=" + add_brand_type + "&BrandStatus=" + BrandStatus;
    // alert(data)
    if (add_brand_name != "") {
      $.ajax({
					type: "POST",
					url: "modul/maindata/brand/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						 // alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadBrand();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditBrand(BrandId, BrandStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Brand',
  		message: $('<div></div>').load('modul/maindata/brand/view/from_edit_data.php',{BrandId:BrandId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieBrandPro(BrandId, BrandStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieBrandPro(BrandId, BrandStatus) {
    var edit_brand_name = $("#edit_brand_name").val();
    var edit_brand_type = $("#edit_brand_type").val();
    var edit_brand_status = "";

    if ($("#edit_brand_status1").is(':checked')) {
      edit_brand_status = 1;
    }else if ($("#edit_brand_status0").is(':checked')) {
      edit_brand_status = 0;
    }

    var data = "edit_brand_name=" + edit_brand_name + "&edit_brand_type=" + edit_brand_type + "&edit_brand_status=" + edit_brand_status + "&BrandId=" + BrandId + "&BrandStatus=" + BrandStatus;

      if (edit_brand_name != '' && edit_brand_socket != 0) {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/brand/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadBrand();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelBrand(BrandId, BrandName, BrandStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Brand',
  			message: "Confirm delete Brand : " + BrandName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "BrandId=" + BrandId + "&BrandStatus=" + BrandStatus;
  					$.ajax({
  						  url: "modul/maindata/brand/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadBrand();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Brand

  // Start Typeram

  function LoadTyperam() {
		$("#content").load("modul/maindata/typeram/view/show_data.php");
	}

  function AddTyperam(TyperamStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Typeram',
  		message: $('<div></div>').load('modul/maindata/typeram/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddTyperamPro(TyperamStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddTyperamPro(TyperamStatus) {
    var add_typeram_name = $("#add_typeram_name").val();
    var add_typeram_type = $("#add_typeram_type").val();

    var data = "add_typeram_name=" + add_typeram_name + "&add_typeram_type=" + add_typeram_type + "&TyperamStatus=" + TyperamStatus;

    if (add_typeram_name != "" && add_typeram_type != 0) {
      $.ajax({
					type: "POST",
					url: "modul/maindata/typeram/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadTyperam();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditTyperam(TyperamId, TyperamStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Typeram',
  		message: $('<div></div>').load('modul/maindata/typeram/view/from_edit_data.php',{TyperamId:TyperamId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieTyperamPro(TyperamId, TyperamStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieTyperamPro(TyperamId, TyperamStatus) {
    var edit_typeram_name = $("#edit_typeram_name").val();
    var edit_typeram_type = $("#edit_typeram_type").val();
    var edit_typeram_status = "";

    if ($("#edit_typeram_status1").is(':checked')) {
      edit_typeram_status = 1;
    }else if ($("#edit_typeram_status0").is(':checked')) {
      edit_typeram_status = 0;
    }

    var data = "edit_typeram_name=" + edit_typeram_name + "&edit_typeram_type=" + edit_typeram_type + "&edit_typeram_status=" + edit_typeram_status + "&TyperamId=" + TyperamId + "&TyperamStatus=" + TyperamStatus;

      if (edit_typeram_name != '' && edit_typeram_type != 0) {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/typeram/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadTyperam();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelTyperam(TyperamId, TyperamName, TyperamStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Typeram',
  			message: "Confirm delete Typeram : " + TyperamName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "TyperamId=" + TyperamId + "&TyperamStatus=" + TyperamStatus;
  					$.ajax({
  						  url: "modul/maindata/typeram/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadTyperam();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Typeram

  // Start Busram

  function LoadBusram() {
		$("#content").load("modul/maindata/busram/view/show_data.php");
	}

  function AddBusram(BusramStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Busram',
  		message: $('<div></div>').load('modul/maindata/busram/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddBusramPro(BusramStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddBusramPro(BusramStatus) {
    var add_busram_name = $("#add_busram_name").val();
    var add_busram_type = $("#add_busram_type").val();

    var data = "add_busram_name=" + add_busram_name + "&add_busram_type=" + add_busram_type + "&BusramStatus=" + BusramStatus;
    // alert(data)
    if (add_busram_name != "" && add_busram_type != 0) {
      $.ajax({
					type: "POST",
					url: "modul/maindata/busram/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadBusram();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditBusram(BusramId, BusramStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Busram',
  		message: $('<div></div>').load('modul/maindata/busram/view/from_edit_data.php',{BusramId:BusramId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieBusramPro(BusramId, BusramStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieBusramPro(BusramId, BusramStatus) {
    var edit_busram_name = $("#edit_busram_name").val();
    var edit_busram_type = $("#edit_busram_type").val();
    var edit_busram_status = "";

    if ($("#edit_busram_status1").is(':checked')) {
      edit_busram_status = 1;
    }else if ($("#edit_busram_status0").is(':checked')) {
      edit_busram_status = 0;
    }

    var data = "edit_busram_name=" + edit_busram_name + "&edit_busram_type=" + edit_busram_type + "&edit_busram_status=" + edit_busram_status + "&BusramId=" + BusramId + "&BusramStatus=" + BusramStatus;

      if (edit_busram_name != '' && edit_busram_type != 0) {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/busram/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadBusram();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelBusram(BusramId, BusramName, BusramStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Busram',
  			message: "Confirm delete Busram : " + BusramName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "BusramId=" + BusramId + "&BusramStatus=" + BusramStatus;
  					$.ajax({
  						  url: "modul/maindata/busram/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadBusram();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Busram

  // Start Capacity HDD

  function LoadCapacityhdd() {
		$("#content").load("modul/maindata/capacityhdd/view/show_data.php");
	}

  function AddCapacityhdd(CapacityhddStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Capacity HDD',
  		message: $('<div></div>').load('modul/maindata/capacityhdd/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddCapacityhddPro(CapacityhddStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddCapacityhddPro(CapacityhddStatus) {
    var add_capacityhdd_name = $("#add_capacityhdd_name").val();

    var data = "add_capacityhdd_name=" + add_capacityhdd_name + "&CapacityhddStatus=" + CapacityhddStatus;
    // alert(data)
    if (add_capacityhdd_name != "") {
      $.ajax({
					type: "POST",
					url: "modul/maindata/capacityhdd/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadCapacityhdd();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditCapacityhdd(CapacityhddId, CapacityhddStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Capacity HDD',
  		message: $('<div></div>').load('modul/maindata/capacityhdd/view/from_edit_data.php',{CapacityhddId:CapacityhddId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieCapacityhddPro(CapacityhddId, CapacityhddStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieCapacityhddPro(CapacityhddId, CapacityhddStatus) {
    var edit_capacityhdd_name = $("#edit_capacityhdd_name").val();
    var edit_capacityhdd_status = "";

    if ($("#edit_capacityhdd_status1").is(':checked')) {
      edit_capacityhdd_status = 1;
    }else if ($("#edit_capacityhdd_status0").is(':checked')) {
      edit_capacityhdd_status = 0;
    }

    var data = "edit_capacityhdd_name=" + edit_capacityhdd_name + "&edit_capacityhdd_status=" + edit_capacityhdd_status + "&CapacityhddId=" + CapacityhddId + "&CapacityhddStatus=" + CapacityhddStatus;

      if (edit_capacityhdd_name != '') {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/capacityhdd/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadCapacityhdd();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelCapacityhdd(CapacityhddId, CapacityhddName, CapacityhddStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Capacity HDD',
  			message: "Confirm delete Capacity HDD : " + CapacityhddName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "CapacityhddId=" + CapacityhddId + "&CapacityhddStatus=" + CapacityhddStatus;
  					$.ajax({
  						  url: "modul/maindata/capacityhdd/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadCapacityhdd();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Capacity HDD

  // Start Type HDD

  function LoadTypehdd() {
		$("#content").load("modul/maindata/typehdd/view/show_data.php");
	}

  function AddTypehdd(TypehddStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Type HDD',
  		message: $('<div></div>').load('modul/maindata/typehdd/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddTypehddPro(TypehddStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddTypehddPro(TypehddStatus) {
    var add_typehdd_name = $("#add_typehdd_name").val();

    var data = "add_typehdd_name=" + add_typehdd_name + "&TypehddStatus=" + TypehddStatus;
    // alert(data)
    if (add_typehdd_name != "") {
      $.ajax({
					type: "POST",
					url: "modul/maindata/typehdd/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadTypehdd();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditTypehdd(TypehddId, TypehddStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Type HDD',
  		message: $('<div></div>').load('modul/maindata/typehdd/view/from_edit_data.php',{TypehddId:TypehddId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieTypehddPro(TypehddId, TypehddStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieTypehddPro(TypehddId, TypehddStatus) {
    var edit_typehdd_name = $("#edit_typehdd_name").val();
    var edit_typehdd_status = "";

    if ($("#edit_typehdd_status1").is(':checked')) {
      edit_typehdd_status = 1;
    }else if ($("#edit_typehdd_status0").is(':checked')) {
      edit_typehdd_status = 0;
    }

    var data = "edit_typehdd_name=" + edit_typehdd_name + "&edit_typehdd_status=" + edit_typehdd_status + "&TypehddId=" + TypehddId + "&TypehddStatus=" + TypehddStatus;

      if (edit_typehdd_name != '') {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/typehdd/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadTypehdd();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelTypehdd(TypehddId, TypehddName, TypehddStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Type HDD',
  			message: "Confirm delete Type HDD : " + TypehddName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "TypehddId=" + TypehddId + "&TypehddStatus=" + TypehddStatus;
  					$.ajax({
  						  url: "modul/maindata/typehdd/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadTypehdd();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Type HDD

  // Start Watt PW

  function LoadWattpw() {
		$("#content").load("modul/maindata/wattpw/view/show_data.php");
	}

  function AddWattpw(WattpwStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_SUCCESS,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-plus"></i> Add Watt Powersupply',
  		message: $('<div></div>').load('modul/maindata/wattpw/view/from_add_data.php'),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-success',
  			action: function(dialogItself){
  				AddWattpwPro(WattpwStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function AddWattpwPro(WattpwStatus) {
    var add_wattpw_name = $("#add_wattpw_name").val();

    var data = "add_wattpw_name=" + add_wattpw_name + "&WattpwStatus=" + WattpwStatus;
    // alert(data)
    if (add_wattpw_name != "") {
      $.ajax({
					type: "POST",
					url: "modul/maindata/wattpw/process/chk_data_pro.php",
					cache: false,
					data: data,
					success: function(msg){
						// alert(msg)
						if (msg == "Y") {
							swal("Record results", "Save successfully.", "success");
							LoadWattpw();
						}else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
						},
					error: function(){
					//
						},
					complete: function(){
					//
						}
				});
    }else {
        swal("Record results", "Please check the information.", "warning");
      }
  }

  function EditWattpw(WattpwId, WattpwStatus) {
    BootstrapDialog.show({
  		type: BootstrapDialog.TYPE_WARNING,
  		//size: BootstrapDialog.SIZE_WIDE,
  		title: '<i class="glyphicon glyphicon-cog"></i> Edit Watt Powersupply',
  		message: $('<div></div>').load('modul/maindata/wattpw/view/from_edit_data.php',{WattpwId:WattpwId}),
  		buttons: [{
  			label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
  			// no title as it is optional
  			cssClass: 'btn-warning',
  			action: function(dialogItself){
  				EdieWattpwPro(WattpwId, WattpwStatus);
  				dialogItself.close();
  			}
  		}, {
  			label: 'Cancel',
  			action: function(dialogItself){
  				dialogItself.close();
  			}
  		}],
  		draggable: true,
  		closable:false
  	});
  }

  function EdieWattpwPro(WattpwId, WattpwStatus) {
    var edit_wattpw_name = $("#edit_wattpw_name").val();
    var edit_wattpw_status = "";

    if ($("#edit_wattpw_status1").is(':checked')) {
      edit_wattpw_status = 1;
    }else if ($("#edit_wattpw_status0").is(':checked')) {
      edit_wattpw_status = 0;
    }

    var data = "edit_wattpw_name=" + edit_wattpw_name + "&edit_wattpw_status=" + edit_wattpw_status + "&WattpwId=" + WattpwId + "&WattpwStatus=" + WattpwStatus;

      if (edit_wattpw_name != '') {
      $.ajax({
  					type: "POST",
  					url: "modul/maindata/wattpw/process/chk_data_pro.php",
  					cache: false,
  					data: data,
  					success: function(msg){
  						// alert(msg)
  						if (msg == "Y") {
  							swal("Record results", "Save successfully.", "success");
  							LoadWattpw();
  						}else {
                swal("Record results", "Unsuccessful recording !", "error");
              }
  						},
  					error: function(){
  					//
  						},
  					complete: function(){
  					//
  						}
  				});
        }else {
          swal("Record results", "Please check the information.", "warning");
        }
  }

  function DelWattpw(WattpwId, WattpwName, WattpwStatus) {
    //alert(EmpId+' | '+EmpName)
      BootstrapDialog.show({
  			type: BootstrapDialog.TYPE_DANGER,
  			title: '<i class="fa fa-trash-o"></i> Delete Watt Powersupply',
  			message: "Confirm delete Watt Powersupply : " + WattpwName + " Yes/No ? ",
  			buttons: [{
  				label: 'Yes',
  				// no title as it is optional
  				cssClass: 'btn-danger',
  				action: function(dialogItself){
  					var data = "WattpwId=" + WattpwId + "&WattpwStatus=" + WattpwStatus;
  					$.ajax({
  						  url: "modul/maindata/wattpw/process/chk_data_pro.php",
  							dataType: "html",
  							type: 'POST', //I want a type as POST
  							data: data,
  							success: function(msg){
  								//alert(msg);
  								if(msg=="Y"){
  									dialogItself.close();
                    swal("Record results", "Delete successfully.", "success");
  									LoadWattpw();
  								}else{
  									dialogItself.close();
                    swal("Record results", "Failed to delete !", "error");
  								}
  							},
  							error: function() {

  							}
  						});
  				}
  			}, {
  				label: 'No',
  				action: function(dialogItself){
  					dialogItself.close();
  				}
  			}],
  			draggable: true,
  			closable:false
  		});
  }

  // End Watt PW

// End Modul maindata



// Start Detail CPU

function LoadCPU() {
  $("#content").load("modul/detailcpu/view/show_data.php");
}

function AddCPU(CPUStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-plus"></i> Add CPU',
    message: $('<div></div>').load('modul/detailcpu/view/from_add_data.php'),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-success',
      action: function(dialogItself){
        AddCPUPro(CPUStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddCPUPro(CPUStatus) {
  var add_cpu_name = $("#add_cpu_name").val();
  var add_cpu_series = $("#add_cpu_series").val();
  var add_cpu_socket = $("#add_cpu_socket").val();
  var add_cpu_core = $("#add_cpu_core").val();
  var add_cpu_thread = $("#add_cpu_thread").val();
  var add_cpu_frequency = $("#add_cpu_frequency").val();
  var add_cpu_turbo = $("#add_cpu_turbo").val();
  var add_cpu_cacheL2 = $("#add_cpu_cacheL2").val();
  var add_cpu_cacheL3 = $("#add_cpu_cacheL3").val();
  var add_cpu_tdp = $("#add_cpu_tdp").val();
  var add_cpu_price = $("#add_cpu_price").val();
  var add_cpu_warranty = $("#add_cpu_warranty").val();

  var data = "add_cpu_name=" + add_cpu_name + "&add_cpu_series=" + add_cpu_series + "&add_cpu_socket=" + add_cpu_socket + "&add_cpu_core=" + add_cpu_core + "&add_cpu_thread=" + add_cpu_thread + "&add_cpu_frequency=" + add_cpu_frequency;
  data += "&add_cpu_turbo=" + add_cpu_turbo + "&add_cpu_cacheL2=" + add_cpu_cacheL2 + "&add_cpu_cacheL3=" + add_cpu_cacheL3 + "&add_cpu_tdp=" + add_cpu_tdp + "&add_cpu_price=" + add_cpu_price + "&add_cpu_warranty=" + add_cpu_warranty  + "&CPUStatus=" + CPUStatus;
  // alert(data)
  if (add_cpu_name != "" && add_cpu_series != 0 && add_cpu_socket != 0 && add_cpu_price != "") {
    $.ajax({
        type: "POST",
        url: "modul/detailcpu/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            LoadCPU();
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
  }else {
      swal("Record results", "Please check the information.", "warning");
    }
}

function ImgCPU(CPUId, CPUName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-picture"></i> Photo : ' + CPUName,
    message: $('<div></div>').load('modul/detailcpu/view/from_add_img.php',{CPUId:CPUId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddImgCPU(CPUId) {
  if (document.getElementById("fileToUpload").files.length != 0) {
    $.ajax({
  		url: "modul/detailcpu/process/chk_upimg.php?CPUId=" + CPUId + "",
  		type: "POST",
  		data: new FormData($("#frm")[0]), // The form with the file    inputs.
  		processData: false,                          // Using FormData, no need to process data.
  		contentType:false
    }).done(function(data){
      // alert(data)
  		  if (data == 1){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
  		  }else if(data == 2){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
  		  }else if(data == 3){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
  		  }else if(data == 4){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
  		  }else{
  			  BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
          $("#showimg").load("modul/detailcpu/view/show_img.php",{CPUId:CPUId});
  		  }
  		}).fail(function(){
  			BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
  		});

  }

}

function ShowImgCPU(ImgCPUId, CPUId, CPUStatus) {
  var data = "ImgCPUId=" + ImgCPUId + "&CPUId=" + CPUId + "&CPUStatus=" + CPUStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailcpu/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailcpu/view/show_img.php",{CPUId:CPUId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function HideImgCPU(ImgCPUId, CPUId, CPUStatus) {
  var data = "ImgCPUId=" + ImgCPUId + "&CPUId=" + CPUId + "&CPUStatus=" + CPUStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailcpu/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailcpu/view/show_img.php",{CPUId:CPUId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function MainImgCPU(ImgCPUId, CPUId, CPUStatus) {
  var data = "ImgCPUId=" + ImgCPUId + "&CPUId=" + CPUId + "&CPUStatus=" + CPUStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailcpu/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailcpu/view/show_img.php",{CPUId:CPUId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function DelImgCPU(ImgCPUId, CPUId, CPUStatus) {
  var data = "ImgCPUId=" + ImgCPUId + "&CPUStatus=" + CPUStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailcpu/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailcpu/view/show_img.php",{CPUId:CPUId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function EditCPU(CPUId, CPUStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-cog"></i> Edit Watt Powersupply',
    message: $('<div></div>').load('modul/detailcpu/view/from_edit_data.php',{CPUId:CPUId}),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-warning',
      action: function(dialogItself){
        EdieCPUPro(CPUId, CPUStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function EdieCPUPro(CPUId, CPUStatus) {
  var edit_cpu_name = $("#edit_cpu_name").val();
  var edit_cpu_series = $("#edit_cpu_series").val();
  var edit_cpu_socket = $("#edit_cpu_socket").val();
  var edit_cpu_core = $("#edit_cpu_core").val();
  var edit_cpu_thread = $("#edit_cpu_thread").val();
  var edit_cpu_frequency = $("#edit_cpu_frequency").val();
  var edit_cpu_turbo = $("#edit_cpu_turbo").val();
  var edit_cpu_cacheL2 = $("#edit_cpu_cacheL2").val();
  var edit_cpu_cacheL3 = $("#edit_cpu_cacheL3").val();
  var edit_cpu_tdp = $("#edit_cpu_tdp").val();
  var edit_cpu_price = $("#edit_cpu_price").val();
  var edit_cpu_warranty = $("#edit_cpu_warranty").val();
  var edit_cpu_status = "";

  if ($("#edit_cpu_status1").is(':checked')) {
    edit_cpu_status = 1;
  }else if ($("#edit_cpu_status0").is(':checked')) {
    edit_cpu_status = 0;
  }

  var data = "edit_cpu_name=" + edit_cpu_name + "&edit_cpu_series=" + edit_cpu_series + "&edit_cpu_socket=" + edit_cpu_socket + "&edit_cpu_core=" + edit_cpu_core + "&edit_cpu_thread=" + edit_cpu_thread + "&edit_cpu_frequency=" + edit_cpu_frequency + "&edit_cpu_status=" + edit_cpu_status;
  data += "&edit_cpu_turbo=" + edit_cpu_turbo + "&edit_cpu_cacheL2=" + edit_cpu_cacheL2 + "&edit_cpu_cacheL3=" + edit_cpu_cacheL3 + "&edit_cpu_tdp=" + edit_cpu_tdp + "&edit_cpu_price=" + edit_cpu_price + "&edit_cpu_warranty=" + edit_cpu_warranty  + "&CPUId=" + CPUId + "&CPUStatus=" + CPUStatus;
  // alert(data)
  if (edit_cpu_name != "" && edit_cpu_series != 0 && edit_cpu_socket != 0 && edit_cpu_price != "") {
    $.ajax({
          type: "POST",
          url: "modul/detailcpu/process/chk_data_pro.php",
          cache: false,
          data: data,
          success: function(msg){
            // alert(msg)
            if (msg == "Y") {
              swal("Record results", "Save successfully.", "success");
              LoadCPU();
            }else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
            },
          error: function(){
          //
            },
          complete: function(){
          //
            }
        });
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
}

function DelCPU(CPUId, CPUName, CPUStatus) {
  //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: '<i class="fa fa-trash-o"></i> Delete CPU',
      message: "Confirm delete CPU : " + CPUName + " Yes/No ? ",
      buttons: [{
        label: 'Yes',
        // no title as it is optional
        cssClass: 'btn-danger',
        action: function(dialogItself){
          var data = "CPUId=" + CPUId + "&CPUStatus=" + CPUStatus;
          $.ajax({
              url: "modul/detailcpu/process/chk_data_pro.php",
              dataType: "html",
              type: 'POST', //I want a type as POST
              data: data,
              success: function(msg){
                //alert(msg);
                if(msg=="Y"){
                  dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
                  LoadCPU();
                }else{
                  dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
                }
              },
              error: function() {

              }
            });
        }
      }, {
        label: 'No',
        action: function(dialogItself){
          dialogItself.close();
        }
      }],
      draggable: true,
      closable:false
    });
}

function DetailCPU(CPUId, CPUName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_PRIMARY,
    size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-list-alt"></i> Detail : ' + CPUName ,
    // message: $('<div></div>').load('modul/detailcpu/view/view_img.php'),
    message: $('<div></div>').load('modul/detailcpu/view/view_img.php',{CPUId:CPUId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

// End Detail CPU


// Start Detail MB

function LoadMB() {
  $("#content").load("modul/detailmb/view/show_data.php");
}

function AddMB(MBStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-plus"></i> Add Mainboard',
    message: $('<div></div>').load('modul/detailmb/view/from_add_data.php'),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-success',
      action: function(dialogItself){
        AddMBPro(MBStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddMBPro(MBStatus) {
  var add_mb_name = $("#add_mb_name").val();
  var add_mb_socket = $("#add_mb_socket").val();
  var add_mb_brand = $("#add_mb_brand").val();

  var numcountbusram = $("#numcountbusram").val();
  var add_mb_busram = "";
  var newnumcountbusram = 0;
  for (var i = 0; i < numcountbusram; i++) {
    if ($("#busrammb"+i).is(':checked')){
      if (add_mb_busram == "") {
        add_mb_busram = $("#busrammb"+i).val();
        newnumcountbusram += 1;
      }else {
        add_mb_busram = add_mb_busram + ',' + $("#busrammb"+i).val();
        newnumcountbusram += 1;
      }
    }
  }
    // alert(add_mb_busram+' | '+newnumcountbusram);

  var numcountseries = $("#numcountseries").val();
  var add_mb_series = "";
  var newnumcountseries = 0;
  for (var i = 0; i < numcountseries; i++) {
    if ($("#seriesmb"+i).is(':checked')){
      if (add_mb_series == "") {
        add_mb_series = $("#seriesmb"+i).val();
        newnumcountseries += 1;
      }else {
        add_mb_series = add_mb_series + ',' + $("#seriesmb"+i).val();
        newnumcountseries += 1;
      }
    }
  }
  // alert(numcountseries+' | '+newnumcountseries)

  var add_mb_graphics = $("#add_mb_graphics").val();
  var add_mb_audio = $("#add_mb_audio").val();
  var add_mb_sata = $("#add_mb_sata").val();
  var add_mb_m2 = $("#add_mb_m2").val();
  var add_mb_slot = $("#add_mb_slot").val();
  var add_mb_lanspeed = $("#add_mb_lanspeed").val();
  var add_mb_usb2 = $("#add_mb_usb2").val();
  var add_mb_usb3 = $("#add_mb_usb3").val();
  var add_mb_dviport = $("#add_mb_dviport").val();
  var add_mb_hdmiport = $("#add_mb_hdmiport").val();
  var add_mb_audioport = $("#add_mb_audioport").val();
  var add_mb_lanport = $("#add_mb_lanport").val();
  var add_mb_fromfactor = $("#add_mb_fromfactor").val();
  var add_mb_warranty = $("#add_mb_warranty").val();
  var add_mb_price = $("#add_mb_price").val();

  var data = "add_mb_name=" + add_mb_name + "&add_mb_socket=" + add_mb_socket + "&add_mb_brand=" + add_mb_brand + "&numcountbusram=" + numcountbusram + "&add_mb_busram=" + add_mb_busram + "&newnumcountbusram=" + newnumcountbusram;
  data += "&numcountseries=" + numcountseries + "&add_mb_series=" + add_mb_series + "&newnumcountseries=" + newnumcountseries + "&add_mb_graphics=" + add_mb_graphics + "&add_mb_audio=" + add_mb_audio + "&add_mb_sata=" + add_mb_sata;
  data += "&add_mb_m2=" + add_mb_m2 + "&add_mb_slot=" + add_mb_slot + "&add_mb_lanspeed=" + add_mb_lanspeed + "&add_mb_usb2=" + add_mb_usb2 + "&add_mb_usb3=" + add_mb_usb3 + "&add_mb_dviport=" + add_mb_dviport + "&add_mb_hdmiport=" + add_mb_hdmiport;
  data += "&add_mb_hdmiport=" + add_mb_hdmiport + "&add_mb_audioport=" + add_mb_audioport + "&add_mb_lanport=" + add_mb_lanport + "&add_mb_fromfactor=" + add_mb_fromfactor + "&add_mb_warranty=" + add_mb_warranty + "&add_mb_price=" + add_mb_price + "&MBStatus=" + MBStatus;
  // alert(data)
  if (add_mb_name != "" && add_mb_series != 0 && add_mb_socket != 0 && add_mb_price != "" && add_mb_busram != "" && add_mb_series != "") {
    $.ajax({
        type: "POST",
        url: "modul/detailmb/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            LoadMB();
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
  }else {
      swal("Record results", "Please check the information.", "warning");
    }
}

function ImgMB(MBId, MBName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-picture"></i> Photo : ' + MBName,
    // message: $('<div></div>').load('modul/detailmb/view/from_add_img.php'),
    message: $('<div></div>').load('modul/detailmb/view/from_add_img.php',{MBId:MBId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddImgMB(MBId) {
  if (document.getElementById("fileToUpload").files.length != 0) {
    $.ajax({
  		url: "modul/detailmb/process/chk_upimg.php?MBId=" + MBId + "",
  		type: "POST",
  		data: new FormData($("#frm")[0]), // The form with the file    inputs.
  		processData: false,                          // Using FormData, no need to process data.
  		contentType:false
    }).done(function(data){
  		  if (data == 1){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
  		  }else if(data == 2){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
  		  }else if(data == 3){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
  		  }else if(data == 4){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
  		  }else{
  			  BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
          $("#showimg").load("modul/detailmb/view/show_img.php",{MBId:MBId});
  		  }
  		}).fail(function(){
  			BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
  		});

  }

}

function ShowImgMB(ImgMBId, MBId, MBStatus) {
  var data = "ImgMBId=" + ImgMBId + "&MBId=" + MBId + "&MBStatus=" + MBStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailmb/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailmb/view/show_img.php",{MBId:MBId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function HideImgMB(ImgMBId, MBId, MBStatus) {
  var data = "ImgMBId=" + ImgMBId + "&MBId=" + MBId + "&MBStatus=" + MBStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailmb/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailmb/view/show_img.php",{MBId:MBId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function MainImgMB(ImgMBId, MBId, MBStatus) {
  var data = "ImgMBId=" + ImgMBId + "&MBId=" + MBId + "&MBStatus=" + MBStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailmb/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailmb/view/show_img.php",{MBId:MBId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function DelImgMB(ImgMBId, MBId, MBStatus) {
  var data = "ImgMBId=" + ImgMBId + "&MBStatus=" + MBStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailmb/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailmb/view/show_img.php",{MBId:MBId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function EditMB(MBId, MBStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-cog"></i> Edit Mainboard',
    message: $('<div></div>').load('modul/detailmb/view/from_edit_data.php',{MBId:MBId}),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-warning',
      action: function(dialogItself){
        EdieMBPro(MBId, MBStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function EdieMBPro(MBId, MBStatus) {
  var edit_mb_name = $("#edit_mb_name").val();
  var edit_mb_socket = $("#edit_mb_socket").val();
  var edit_mb_brand = $("#edit_mb_brand").val();

  var numcountbusram = $("#numcountbusram").val();
  var edit_mb_busram = "";
  var newnumcountbusram = 0;
  for (var i = 0; i < numcountbusram; i++) {
    if ($("#busrammb"+i).is(':checked')){
      if (edit_mb_busram == "") {
        edit_mb_busram = $("#busrammb"+i).val();
        newnumcountbusram += 1;
      }else {
        edit_mb_busram = edit_mb_busram + ',' + $("#busrammb"+i).val();
        newnumcountbusram += 1;
      }
    }
  }
    // alert(add_mb_busram+' | '+newnumcountbusram);

  var numcountseries = $("#numcountseries").val();
  var edit_mb_series = "";
  var newnumcountseries = 0;
  for (var i = 0; i < numcountseries; i++) {
    if ($("#seriesmb"+i).is(':checked')){
      if (edit_mb_series == "") {
        edit_mb_series = $("#seriesmb"+i).val();
        newnumcountseries += 1;
      }else {
        edit_mb_series = edit_mb_series + ',' + $("#seriesmb"+i).val();
        newnumcountseries += 1;
      }
    }
  }
  // alert(numcountseries+' | '+newnumcountseries)

  var edit_mb_graphics = $("#edit_mb_graphics").val();
  var edit_mb_audio = $("#edit_mb_audio").val();
  var edit_mb_sata = $("#edit_mb_sata").val();
  var edit_mb_m2 = $("#edit_mb_m2").val();
  var edit_mb_slot = $("#edit_mb_slot").val();
  var edit_mb_lanspeed = $("#edit_mb_lanspeed").val();
  var edit_mb_usb2 = $("#edit_mb_usb2").val();
  var edit_mb_usb3 = $("#edit_mb_usb3").val();
  var edit_mb_dviport = $("#edit_mb_dviport").val();
  var edit_mb_hdmiport = $("#edit_mb_hdmiport").val();
  var edit_mb_audioport = $("#edit_mb_audioport").val();
  var edit_mb_lanport = $("#edit_mb_lanport").val();
  var edit_mb_fromfactor = $("#edit_mb_fromfactor").val();
  var edit_mb_warranty = $("#edit_mb_warranty").val();
  var edit_mb_price = $("#edit_mb_price").val();
  var edit_mb_status = "";

  if ($("#edit_mb_status1").is(':checked')) {
    edit_mb_status = 1;
  }else if ($("#edit_mb_status0").is(':checked')) {
    edit_mb_status = 0;
  }

  var data = "edit_mb_name=" + edit_mb_name + "&edit_mb_socket=" + edit_mb_socket + "&edit_mb_brand=" + edit_mb_brand + "&numcountbusram=" + numcountbusram + "&edit_mb_busram=" + edit_mb_busram + "&newnumcountbusram=" + newnumcountbusram;
  data += "&numcountseries=" + numcountseries + "&edit_mb_series=" + edit_mb_series + "&newnumcountseries=" + newnumcountseries + "&edit_mb_graphics=" + edit_mb_graphics + "&edit_mb_audio=" + edit_mb_audio + "&edit_mb_sata=" + edit_mb_sata;
  data += "&edit_mb_m2=" + edit_mb_m2 + "&edit_mb_slot=" + edit_mb_slot + "&edit_mb_lanspeed=" + edit_mb_lanspeed + "&edit_mb_usb2=" + edit_mb_usb2 + "&edit_mb_usb3=" + edit_mb_usb3 + "&edit_mb_dviport=" + edit_mb_dviport + "&edit_mb_hdmiport=" + edit_mb_hdmiport;
  data += "&edit_mb_hdmiport=" + edit_mb_hdmiport + "&edit_mb_audioport=" + edit_mb_audioport + "&edit_mb_lanport=" + edit_mb_lanport + "&edit_mb_fromfactor=" + edit_mb_fromfactor + "&edit_mb_warranty=" + edit_mb_warranty + "&edit_mb_price=" + edit_mb_price;
  data += "&edit_mb_status=" + edit_mb_status + "&MBId=" + MBId + "&MBStatus=" + MBStatus;
  // alert(data)
  if (edit_mb_name != "" && edit_mb_series != 0 && edit_mb_socket != 0 && edit_mb_price != "" && edit_mb_busram != "" && edit_mb_series != "") {
    $.ajax({
          type: "POST",
          url: "modul/detailmb/process/chk_data_pro.php",
          cache: false,
          data: data,
          success: function(msg){
            // alert(msg)
            if (msg == "Y") {
              swal("Record results", "Save successfully.", "success");
              LoadMB();
            }else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
            },
          error: function(){
          //
            },
          complete: function(){
          //
            }
        });
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
}

function DelMB(MBId, MBName, MBStatus) {
  //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: '<i class="fa fa-trash-o"></i> Delete Mainboard',
      message: "Confirm delete Mainboard : " + MBName + " Yes/No ? ",
      buttons: [{
        label: 'Yes',
        // no title as it is optional
        cssClass: 'btn-danger',
        action: function(dialogItself){
          var data = "MBId=" + MBId + "&MBStatus=" + MBStatus;
          $.ajax({
              url: "modul/detailmb/process/chk_data_pro.php",
              dataType: "html",
              type: 'POST', //I want a type as POST
              data: data,
              success: function(msg){
                //alert(msg);
                if(msg=="Y"){
                  dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
                  LoadMB();
                }else{
                  dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
                }
              },
              error: function() {

              }
            });
        }
      }, {
        label: 'No',
        action: function(dialogItself){
          dialogItself.close();
        }
      }],
      draggable: true,
      closable:false
    });
}

function DetailMB(MBId, MBName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_PRIMARY,
    size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-list-alt"></i> Detail : ' + MBName ,
    // message: $('<div></div>').load('modul/detailcpu/view/view_img.php'),
    message: $('<div></div>').load('modul/detailmb/view/view_img.php',{MBId:MBId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

// End Detail MB


// Start Detail VGA

function LoadVGA() {
  $("#content").load("modul/detailvga/view/show_data.php");
}

function AddVGA(VGAStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-plus"></i> Add Graphic Card',
    message: $('<div></div>').load('modul/detailvga/view/from_add_data.php'),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-success',
      action: function(dialogItself){
        AddVGAPro(VGAStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddVGAPro(VGAStatus) {
  var add_vga_name = $("#add_vga_name").val();
  var add_vga_series = $("#add_vga_series").val();
  var add_vga_brand = $("#add_vga_brand").val();
  var add_vga_gpuspeed = $("#add_vga_gpuspeed").val();
  var add_vga_ramspeed = $("#add_vga_ramspeed").val();
  var add_vga_capacityram = $("#add_vga_capacityram").val();
  var add_vga_typeram = $("#add_vga_typeram").val();
  var add_vga_bus = $("#add_vga_bus").val();
  var add_vga_dviport = $("#add_vga_dviport").val();
  var add_vga_hdmiport = $("#add_vga_hdmiport").val();
  var add_vga_displayport = $("#add_vga_displayport").val();
  var add_vga_tdp = $("#add_vga_tdp").val();
  var add_vga_price = $("#add_vga_price").val();
  var add_vga_warranty = $("#add_vga_warranty").val();

  var data = "add_vga_name=" + add_vga_name + "&add_vga_series=" + add_vga_series + "&add_vga_brand=" + add_vga_brand + "&add_vga_gpuspeed=" + add_vga_gpuspeed + "&add_vga_ramspeed=" + add_vga_ramspeed + "&add_vga_capacityram=" + add_vga_capacityram;
  data += "&add_vga_typeram=" + add_vga_typeram + "&add_vga_bus=" + add_vga_bus + "&add_vga_dviport=" + add_vga_dviport + "&add_vga_hdmiport=" + add_vga_hdmiport + "&add_vga_displayport=" + add_vga_displayport + "&add_vga_tdp=" + add_vga_tdp;
  data += "&add_vga_price=" + add_vga_price + "&add_vga_warranty=" + add_vga_warranty + "&VGAStatus=" + VGAStatus;
  // alert(data)
  if (add_vga_name != "" && add_vga_series != 0 && add_vga_brand != 0 && add_vga_typeram != 0 && add_vga_price != "") {
    $.ajax({
        type: "POST",
        url: "modul/detailvga/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            LoadVGA();
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
  }else {
      swal("Record results", "Please check the information.", "warning");
    }
}

function ImgVGA(VGAId, VGAName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-picture"></i> Photo : ' + VGAName,
    // message: $('<div></div>').load('modul/detailmb/view/from_add_img.php'),
    message: $('<div></div>').load('modul/detailvga/view/from_add_img.php',{VGAId:VGAId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddImgVGA(VGAId) {
  if (document.getElementById("fileToUpload").files.length != 0) {
    $.ajax({
  		url: "modul/detailvga/process/chk_upimg.php?VGAId=" + VGAId + "",
  		type: "POST",
  		data: new FormData($("#frm")[0]), // The form with the file    inputs.
  		processData: false,                          // Using FormData, no need to process data.
  		contentType:false
    }).done(function(data){
  		  if (data == 1){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
  		  }else if(data == 2){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
  		  }else if(data == 3){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
  		  }else if(data == 4){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
  		  }else{
  			  BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
          $("#showimg").load("modul/detailvga/view/show_img.php",{VGAId:VGAId});
  		  }
  		}).fail(function(){
  			BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
  		});

  }

}

function ShowImgVGA(ImgVGAId, VGAId, VGAStatus) {
  var data = "ImgVGAId=" + ImgVGAId + "&VGAId=" + VGAId + "&VGAStatus=" + VGAStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailvga/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailvga/view/show_img.php",{VGAId:VGAId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function HideImgVGA(ImgVGAId, VGAId, VGAStatus) {
  var data = "ImgVGAId=" + ImgVGAId + "&VGAId=" + VGAId + "&VGAStatus=" + VGAStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailvga/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailvga/view/show_img.php",{VGAId:VGAId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function MainImgVGA(ImgVGAId, VGAId, VGAStatus) {
  var data = "ImgVGAId=" + ImgVGAId + "&VGAId=" + VGAId + "&VGAStatus=" + VGAStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailvga/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailvga/view/show_img.php",{VGAId:VGAId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function DelImgVGA(ImgVGAId, VGAId, VGAStatus) {
  var data = "ImgVGAId=" + ImgVGAId + "&VGAStatus=" + VGAStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailvga/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailvga/view/show_img.php",{VGAId:VGAId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function EditVGA(VGAId, VGAStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-cog"></i> Edit Graphic Card',
    message: $('<div></div>').load('modul/detailvga/view/from_edit_data.php',{VGAId:VGAId}),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-warning',
      action: function(dialogItself){
        EdieVGAPro(VGAId, VGAStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function EdieVGAPro(VGAId, VGAStatus) {
  var edit_vga_name = $("#edit_vga_name").val();
  var edit_vga_series = $("#edit_vga_series").val();
  var edit_vga_brand = $("#edit_vga_brand").val();
  var edit_vga_gpuspeed = $("#edit_vga_gpuspeed").val();
  var edit_vga_ramspeed = $("#edit_vga_ramspeed").val();
  var edit_vga_capacityram = $("#edit_vga_capacityram").val();
  var edit_vga_typeram = $("#edit_vga_typeram").val();
  var edit_vga_bus = $("#edit_vga_bus").val();
  var edit_vga_dviport = $("#edit_vga_dviport").val();
  var edit_vga_hdmiport = $("#edit_vga_hdmiport").val();
  var edit_vga_displayport = $("#edit_vga_displayport").val();
  var edit_vga_tdp = $("#edit_vga_tdp").val();
  var edit_vga_price = $("#edit_vga_price").val();
  var edit_vga_warranty = $("#edit_vga_warranty").val();
  var edit_vga_status = "";

  if ($("#edit_vga_status1").is(':checked')) {
    edit_vga_status = 1;
  }else if ($("#edit_vga_status0").is(':checked')) {
    edit_vga_status = 0;
  }

  var data = "edit_vga_name=" + edit_vga_name + "&edit_vga_series=" + edit_vga_series + "&edit_vga_brand=" + edit_vga_brand + "&edit_vga_gpuspeed=" + edit_vga_gpuspeed + "&edit_vga_ramspeed=" + edit_vga_ramspeed
  data += "&edit_vga_capacityram=" + edit_vga_capacityram + "&edit_vga_typeram=" + edit_vga_typeram + "&edit_vga_bus=" + edit_vga_bus + "&edit_vga_dviport=" + edit_vga_dviport + "&edit_vga_hdmiport=" + edit_vga_hdmiport
  data += "&edit_vga_displayport=" + edit_vga_displayport + "&edit_vga_tdp=" + edit_vga_tdp + "&edit_vga_price=" + edit_vga_price + "&edit_vga_warranty=" + edit_vga_warranty + "&edit_vga_status=" + edit_vga_status + "&VGAId=" + VGAId + "&VGAStatus=" + VGAStatus;
  // alert(data)
  if (edit_vga_name != "" && edit_vga_series != 0 && edit_vga_brand != 0 && edit_vga_typeram != 0 && edit_vga_price != "") {
    $.ajax({
          type: "POST",
          url: "modul/detailvga/process/chk_data_pro.php",
          cache: false,
          data: data,
          success: function(msg){
            // alert(msg)
            if (msg == "Y") {
              swal("Record results", "Save successfully.", "success");
              LoadVGA();
            }else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
            },
          error: function(){
          //
            },
          complete: function(){
          //
            }
        });
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
}

function DelVGA(VGAId, VGAName, VGAStatus) {
  //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: '<i class="fa fa-trash-o"></i> Delete Graphic Card',
      message: "Confirm delete Graphic Card : " + VGAName + " Yes/No ? ",
      buttons: [{
        label: 'Yes',
        // no title as it is optional
        cssClass: 'btn-danger',
        action: function(dialogItself){
          var data = "VGAId=" + VGAId + "&VGAStatus=" + VGAStatus;
          $.ajax({
              url: "modul/detailvga/process/chk_data_pro.php",
              dataType: "html",
              type: 'POST', //I want a type as POST
              data: data,
              success: function(msg){
                //alert(msg);
                if(msg=="Y"){
                  dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
                  LoadVGA();
                }else{
                  dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
                }
              },
              error: function() {

              }
            });
        }
      }, {
        label: 'No',
        action: function(dialogItself){
          dialogItself.close();
        }
      }],
      draggable: true,
      closable:false
    });
}

function DetailVGA(VGAId, VGAName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_PRIMARY,
    size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-list-alt"></i> Detail : ' + VGAName ,
    // message: $('<div></div>').load('modul/detailcpu/view/view_img.php'),
    message: $('<div></div>').load('modul/detailvga/view/view_img.php',{VGAId:VGAId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

// End Detail VGA

// Start Detail RAM

function LoadRAM() {
  $("#content").load("modul/detailram/view/show_data.php");
}

function AddRAM(RAMStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-plus"></i> Add RAM',
    message: $('<div></div>').load('modul/detailram/view/from_add_data.php'),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-success',
      action: function(dialogItself){
        AddRAMPro(RAMStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddRAMPro(RAMStatus) {
  var add_ram_name = $("#add_ram_name").val();
  var add_ram_busram = $("#add_ram_busram").val();
  var add_ram_brand = $("#add_ram_brand").val();
  var add_ram_price = $("#add_ram_price").val();
  var add_ram_warranty = $("#add_ram_warranty").val();

  var data = "add_ram_name=" + add_ram_name + "&add_ram_busram=" + add_ram_busram + "&add_ram_brand=" + add_ram_brand + "&add_ram_price=" + add_ram_price + "&add_ram_warranty=" + add_ram_warranty + "&RAMStatus=" + RAMStatus;
  // alert(data)
  if (add_ram_name != "" && add_ram_busram != 0 && add_ram_brand != 0 && add_ram_price != "") {
    $.ajax({
        type: "POST",
        url: "modul/detailram/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            LoadRAM();
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
  }else {
      swal("Record results", "Please check the information.", "warning");
    }
}

function ImgRAM(RAMId, RAMName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-picture"></i> Photo : ' + RAMName,
    // message: $('<div></div>').load('modul/detailmb/view/from_add_img.php'),
    message: $('<div></div>').load('modul/detailram/view/from_add_img.php',{RAMId:RAMId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddImgRAM(RAMId) {
  if (document.getElementById("fileToUpload").files.length != 0) {
    $.ajax({
  		url: "modul/detailram/process/chk_upimg.php?RAMId=" + RAMId + "",
  		type: "POST",
  		data: new FormData($("#frm")[0]), // The form with the file    inputs.
  		processData: false,                          // Using FormData, no need to process data.
  		contentType:false
    }).done(function(data){
  		  if (data == 1){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
  		  }else if(data == 2){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
  		  }else if(data == 3){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
  		  }else if(data == 4){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
  		  }else{
  			  BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
          $("#showimg").load("modul/detailram/view/show_img.php",{RAMId:RAMId});
  		  }
  		}).fail(function(){
  			BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
  		});

  }

}

function ShowImgRAM(ImgRAMId, RAMId, RAMStatus) {
  var data = "ImgRAMId=" + ImgRAMId + "&RAMId=" + RAMId + "&RAMStatus=" + RAMStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailram/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailram/view/show_img.php",{RAMId:RAMId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function HideImgRAM(ImgRAMId, RAMId, RAMStatus) {
  var data = "ImgRAMId=" + ImgRAMId + "&RAMId=" + RAMId + "&RAMStatus=" + RAMStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailram/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailram/view/show_img.php",{RAMId:RAMId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function MainImgRAM(ImgRAMId, RAMId, RAMStatus) {
  var data = "ImgRAMId=" + ImgRAMId + "&RAMId=" + RAMId + "&RAMStatus=" + RAMStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailram/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailram/view/show_img.php",{RAMId:RAMId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function DelImgRAM(ImgRAMId, RAMId, RAMStatus) {
  var data = "ImgRAMId=" + ImgRAMId + "&RAMStatus=" + RAMStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailram/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailram/view/show_img.php",{RAMId:RAMId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function EditRAM(RAMId, RAMStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-cog"></i> Edit RAM',
    message: $('<div></div>').load('modul/detailram/view/from_edit_data.php',{RAMId:RAMId}),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-warning',
      action: function(dialogItself){
        EdieRAMPro(RAMId, RAMStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function EdieRAMPro(RAMId, RAMStatus) {
  var edit_ram_name = $("#edit_ram_name").val();
  var edit_ram_busram = $("#edit_ram_busram").val();
  var edit_ram_brand = $("#edit_ram_brand").val();
  var edit_ram_price = $("#edit_ram_price").val();
  var edit_ram_warranty = $("#edit_ram_warranty").val();
  var edit_ram_status = "";

  if ($("#edit_ram_status1").is(':checked')) {
    edit_ram_status = 1;
  }else if ($("#edit_ram_status0").is(':checked')) {
    edit_ram_status = 0;
  }

  var data = "edit_ram_name=" + edit_ram_name + "&edit_ram_busram=" + edit_ram_busram + "&edit_ram_brand=" + edit_ram_brand + "&edit_ram_price=" + edit_ram_price + "&edit_ram_warranty=" + edit_ram_warranty + "&edit_ram_status=" + edit_ram_status + "&RAMId=" + RAMId + "&RAMStatus=" + RAMStatus;
  // alert(data)
  if (edit_ram_name != "" && edit_ram_busram != 0 && edit_ram_brand != 0 && edit_ram_price != "") {
    $.ajax({
          type: "POST",
          url: "modul/detailram/process/chk_data_pro.php",
          cache: false,
          data: data,
          success: function(msg){
            // alert(msg)
            if (msg == "Y") {
              swal("Record results", "Save successfully.", "success");
              LoadRAM();
            }else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
            },
          error: function(){
          //
            },
          complete: function(){
          //
            }
        });
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
}

function DelRAM(RAMId, RAMName, RAMStatus) {
  //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: '<i class="fa fa-trash-o"></i> Delete RAM',
      message: "Confirm delete RAM : " + RAMName + " Yes/No ? ",
      buttons: [{
        label: 'Yes',
        // no title as it is optional
        cssClass: 'btn-danger',
        action: function(dialogItself){
          var data = "RAMId=" + RAMId + "&RAMStatus=" + RAMStatus;
          $.ajax({
              url: "modul/detailram/process/chk_data_pro.php",
              dataType: "html",
              type: 'POST', //I want a type as POST
              data: data,
              success: function(msg){
                //alert(msg);
                if(msg=="Y"){
                  dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
                  LoadRAM();
                }else{
                  dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
                }
              },
              error: function() {

              }
            });
        }
      }, {
        label: 'No',
        action: function(dialogItself){
          dialogItself.close();
        }
      }],
      draggable: true,
      closable:false
    });
}

function DetailRAM(RAMId, RAMName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_PRIMARY,
    size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-list-alt"></i> Detail : ' + RAMName ,
    // message: $('<div></div>').load('modul/detailcpu/view/view_img.php'),
    message: $('<div></div>').load('modul/detailram/view/view_img.php',{RAMId:RAMId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

// End Detail RAM

// Start Detail HDD

function LoadHDD() {
  $("#content").load("modul/detailhdd/view/show_data.php");
}

function AddHDD(HDDStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-plus"></i> Add Harddisk',
    message: $('<div></div>').load('modul/detailhdd/view/from_add_data.php'),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-success',
      action: function(dialogItself){
        AddHDDPro(HDDStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddHDDPro(HDDStatus) {
  var add_hdd_name = $("#add_hdd_name").val();
  var add_hdd_brand = $("#add_hdd_brand").val();
  var add_hdd_typehdd = $("#add_hdd_typehdd").val();
  var add_hdd_capacity = $("#add_hdd_capacity").val();
  var add_hdd_interface = $("#add_hdd_interface").val();
  var add_hdd_price = $("#add_hdd_price").val();
  var add_hdd_warranty = $("#add_hdd_warranty").val();

  var data = "add_hdd_name=" + add_hdd_name + "&add_hdd_brand=" + add_hdd_brand + "&add_hdd_typehdd=" + add_hdd_typehdd + "&add_hdd_capacity=" + add_hdd_capacity + "&add_hdd_interface=" + add_hdd_interface + "&add_hdd_price=" + add_hdd_price + "&add_hdd_warranty=" + add_hdd_warranty + "&HDDStatus=" + HDDStatus;
  // alert(data)
  if (add_hdd_name != "" && add_hdd_brand != 0 && add_hdd_typehdd != 0 && add_hdd_capacity != 0 && add_hdd_price != "") {
    $.ajax({
        type: "POST",
        url: "modul/detailhdd/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            LoadHDD();
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
  }else {
      swal("Record results", "Please check the information.", "warning");
    }
}

function ImgHDD(HDDId, HDDName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-picture"></i> Photo : ' + HDDName,
    // message: $('<div></div>').load('modul/detailmb/view/from_add_img.php'),
    message: $('<div></div>').load('modul/detailhdd/view/from_add_img.php',{HDDId:HDDId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddImgHDD(HDDId) {
  if (document.getElementById("fileToUpload").files.length != 0) {
    $.ajax({
  		url: "modul/detailhdd/process/chk_upimg.php?HDDId=" + HDDId + "",
  		type: "POST",
  		data: new FormData($("#frm")[0]), // The form with the file    inputs.
  		processData: false,                          // Using FormData, no need to process data.
  		contentType:false
    }).done(function(data){
  		  if (data == 1){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
  		  }else if(data == 2){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
  		  }else if(data == 3){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
  		  }else if(data == 4){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
  		  }else{
  			  BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
          $("#showimg").load("modul/detailhdd/view/show_img.php",{HDDId:HDDId});
  		  }
  		}).fail(function(){
  			BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
  		});

  }

}

function ShowImgHDD(ImgHDDId, HDDId, HDDStatus) {
  var data = "ImgHDDId=" + ImgHDDId + "&HDDId=" + HDDId + "&HDDStatus=" + HDDStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailhdd/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailhdd/view/show_img.php",{HDDId:HDDId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function HideImgHDD(ImgHDDId, HDDId, HDDStatus) {
  var data = "ImgHDDId=" + ImgHDDId + "&HDDId=" + HDDId + "&HDDStatus=" + HDDStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailhdd/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailhdd/view/show_img.php",{HDDId:HDDId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function MainImgHDD(ImgHDDId, HDDId, HDDStatus) {
  var data = "ImgHDDId=" + ImgHDDId + "&HDDId=" + HDDId + "&HDDStatus=" + HDDStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailhdd/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailhdd/view/show_img.php",{HDDId:HDDId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function DelImgHDD(ImgHDDId, HDDId, HDDStatus) {
  var data = "ImgHDDId=" + ImgHDDId + "&HDDStatus=" + HDDStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailhdd/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailhdd/view/show_img.php",{HDDId:HDDId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function EditHDD(HDDId, HDDStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-cog"></i> Edit Harddisk',
    message: $('<div></div>').load('modul/detailhdd/view/from_edit_data.php',{HDDId:HDDId}),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-warning',
      action: function(dialogItself){
        EdieHDDPro(HDDId, HDDStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function EdieHDDPro(HDDId, HDDStatus) {
  var edit_hdd_name = $("#edit_hdd_name").val();
  var edit_hdd_brand = $("#edit_hdd_brand").val();
  var edit_hdd_typehdd = $("#edit_hdd_typehdd").val();
  var edit_hdd_capacity = $("#edit_hdd_capacity").val();
  var edit_hdd_interface = $("#edit_hdd_interface").val();
  var edit_hdd_price = $("#edit_hdd_price").val();
  var edit_hdd_warranty = $("#edit_hdd_warranty").val();
  var edit_hdd_status = "";

  if ($("#edit_hdd_status1").is(':checked')) {
    edit_hdd_status = 1;
  }else if ($("#edit_hdd_status0").is(':checked')) {
    edit_hdd_status = 0;
  }

  var data = "edit_hdd_name=" + edit_hdd_name + "&edit_hdd_brand=" + edit_hdd_brand + "&edit_hdd_typehdd=" + edit_hdd_typehdd + "&edit_hdd_capacity=" + edit_hdd_capacity + "&edit_hdd_interface=" + edit_hdd_interface + "&edit_hdd_price=" + edit_hdd_price + "&edit_hdd_warranty=" + edit_hdd_warranty + "&edit_hdd_status=" + edit_hdd_status + "&HDDId=" + HDDId +  "&HDDStatus=" + HDDStatus;
  alert(data)
  if (edit_hdd_name != "" && edit_hdd_brand != 0 && edit_hdd_typehdd != 0 && edit_hdd_capacity != 0 && edit_hdd_price != "") {

    $.ajax({
          type: "POST",
          url: "modul/detailhdd/process/chk_data_pro.php",
          cache: false,
          data: data,
          success: function(msg){
            alert(msg)
            if (msg == "Y") {
              swal("Record results", "Save successfully.", "success");
              LoadHDD();
            }else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
            },
          error: function(){
          //
            },
          complete: function(){
          //
            }
        });
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
}

function DelHDD(HDDId, HDDName, HDDStatus) {
  //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: '<i class="fa fa-trash-o"></i> Delete Harddisk',
      message: "Confirm delete Harddisk : " + HDDName + " Yes/No ? ",
      buttons: [{
        label: 'Yes',
        // no title as it is optional
        cssClass: 'btn-danger',
        action: function(dialogItself){
          var data = "HDDId=" + HDDId + "&HDDStatus=" + HDDStatus;
          $.ajax({
              url: "modul/detailhdd/process/chk_data_pro.php",
              dataType: "html",
              type: 'POST', //I want a type as POST
              data: data,
              success: function(msg){
                //alert(msg);
                if(msg=="Y"){
                  dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
                  LoadHDD();
                }else{
                  dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
                }
              },
              error: function() {

              }
            });
        }
      }, {
        label: 'No',
        action: function(dialogItself){
          dialogItself.close();
        }
      }],
      draggable: true,
      closable:false
    });
}

function DetailHDD(HDDId, HDDName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_PRIMARY,
    size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-list-alt"></i> Detail : ' + HDDName ,
    // message: $('<div></div>').load('modul/detailcpu/view/view_img.php'),
    message: $('<div></div>').load('modul/detailhdd/view/view_img.php',{HDDId:HDDId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

// End Detail HDD

// Start Detail PW

function LoadPW() {
  $("#content").load("modul/detailpw/view/show_data.php");
}

function AddPW(PWStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_SUCCESS,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-plus"></i> Add Power Supply',
    message: $('<div></div>').load('modul/detailpw/view/from_add_data.php'),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-success',
      action: function(dialogItself){
        AddPWPro(PWStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddPWPro(PWStatus) {
  var add_pw_name = $("#add_pw_name").val();
  var add_pw_brand = $("#add_pw_brand").val();
  var add_pw_watt = $("#add_pw_watt").val();
  var add_pw_mbconnector = $("#add_pw_mbconnector").val();
  var add_pw_cpuconnector = $("#add_pw_cpuconnector").val();
  var add_pw_pciexconnector = $("#add_pw_pciexconnector").val();
  var add_pw_sataconnector = $("#add_pw_sataconnector").val();
  var add_pw_molexconnector = $("#add_pw_molexconnector").val();
  var add_pw_powerinput = $("#add_pw_powerinput").val();
  var add_pw_price = $("#add_pw_price").val();
  var add_pw_warranty = $("#add_pw_warranty").val();

  var data = "add_pw_name=" + add_pw_name + "&add_pw_brand=" + add_pw_brand + "&add_pw_watt=" + add_pw_watt + "&add_pw_mbconnector=" + add_pw_mbconnector + "&add_pw_cpuconnector=" + add_pw_cpuconnector + "&add_pw_pciexconnector=" + add_pw_pciexconnector;
  data += "&add_pw_sataconnector=" + add_pw_sataconnector + "&add_pw_molexconnector=" + add_pw_molexconnector + "&add_pw_powerinput=" + add_pw_powerinput + "&add_pw_price=" + add_pw_price + "&add_pw_warranty=" + add_pw_warranty + "&PWStatus=" + PWStatus;
  // alert(data)
  if (add_pw_name != "" && add_pw_brand != 0 && add_pw_watt != 0 && add_pw_price != "") {
    $.ajax({
        type: "POST",
        url: "modul/detailpw/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            LoadPW();
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
  }else {
      swal("Record results", "Please check the information.", "warning");
    }
}

function ImgPW(PWId, PWName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_INFO,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-picture"></i> Photo : ' + PWName,
    // message: $('<div></div>').load('modul/detailmb/view/from_add_img.php'),
    message: $('<div></div>').load('modul/detailpw/view/from_add_img.php',{PWId:PWId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function AddImgPW(PWId) {
  if (document.getElementById("fileToUpload").files.length != 0) {
    $.ajax({
  		url: "modul/detailpw/process/chk_upimg.php?PWId=" + PWId + "",
  		type: "POST",
  		data: new FormData($("#frm")[0]), // The form with the file    inputs.
  		processData: false,                          // Using FormData, no need to process data.
  		contentType:false
    }).done(function(data){
  		  if (data == 1){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจากไม่ไช่ไฟล์รูปภาพ.");
  		  }else if(data == 2){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ชื่อนี้อยู่ในระบบแล้ว.");
  		  }else if(data == 3){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์มีขนาดใหญ่เกินไป.");
  		  }else if(data == 4){
  			  BootstrapDialog.alert("ไม่สามารถอัพโหลดไฟล์ได้ เนื่องจาก ไฟล์ต้องเป็นชนิด JPG, JPEG, PNG & GIF เท่านั้น.");
  		  }else{
  			  BootstrapDialog.alert("อัพโหลดไฟล์ เสร็จเรียบร้อย.");
          $("#showimg").load("modul/detailpw/view/show_img.php",{PWId:PWId});
  		  }
  		}).fail(function(){
  			BootstrapDialog.alert("ไม่สามารถส่งไฟล์ได้.");
  		});

  }

}

function ShowImgPW(ImgPWId, PWId, PWStatus) {
  var data = "ImgPWId=" + ImgPWId + "&PWId=" + PWId + "&PWStatus=" + PWStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailpw/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailpw/view/show_img.php",{PWId:PWId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function HideImgPW(ImgPWId, PWId, PWStatus) {
  var data = "ImgPWId=" + ImgPWId + "&PWId=" + PWId + "&PWStatus=" + PWStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailpw/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailpw/view/show_img.php",{PWId:PWId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function MainImgPW(ImgPWId, PWId, PWStatus) {
  var data = "ImgPWId=" + ImgPWId + "&PWId=" + PWId + "&PWStatus=" + PWStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailpw/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailpw/view/show_img.php",{PWId:PWId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function DelImgPW(ImgPWId, PWId, PWStatus) {
  var data = "ImgPWId=" + ImgPWId + "&PWStatus=" + PWStatus;
  $.ajax({
        type: "POST",
        url: "modul/detailpw/process/chk_data_pro.php",
        cache: false,
        data: data,
        success: function(msg){
          // alert(msg)
          if (msg == "Y") {
            swal("Record results", "Save successfully.", "success");
            $("#showimg").load("modul/detailpw/view/show_img.php",{PWId:PWId});
          }else {
            swal("Record results", "Unsuccessful recording !", "error");
          }
          },
        error: function(){
        //
          },
        complete: function(){
        //
          }
      });
}

function EditPW(PWId, PWStatus) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_WARNING,
    //size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-cog"></i> Edit Power Supply',
    message: $('<div></div>').load('modul/detailpw/view/from_edit_data.php',{PWId:PWId}),
    buttons: [{
      label: '<i class="glyphicon glyphicon-floppy-disk"></i> Save',
      // no title as it is optional
      cssClass: 'btn-warning',
      action: function(dialogItself){
        EdiePWPro(PWId, PWStatus);
        dialogItself.close();
      }
    }, {
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}

function EdiePWPro(PWId, PWStatus) {

  var edit_pw_name = $("#edit_pw_name").val();
  var edit_pw_brand = $("#edit_pw_brand").val();
  var edit_pw_watt = $("#edit_pw_watt").val();
  var edit_pw_mbconnector = $("#edit_pw_mbconnector").val();
  var edit_pw_cpuconnector = $("#edit_pw_cpuconnector").val();
  var edit_pw_pciexconnector = $("#edit_pw_pciexconnector").val();
  var edit_pw_sataconnector = $("#edit_pw_sataconnector").val();
  var edit_pw_molexconnector = $("#edit_pw_molexconnector").val();
  var edit_pw_powerinput = $("#edit_pw_powerinput").val();
  var edit_pw_price = $("#edit_pw_price").val();
  var edit_pw_warranty = $("#edit_pw_warranty").val();
  var edit_pw_status = "";

  if ($("#edit_pw_status1").is(':checked')) {
    edit_pw_status = 1;
  }else if ($("#edit_pw_status0").is(':checked')) {
    edit_pw_status = 0;
  }

  var data = "edit_pw_name=" + edit_pw_name + "&edit_pw_brand=" + edit_pw_brand + "&edit_pw_watt=" + edit_pw_watt + "&edit_pw_mbconnector=" + edit_pw_mbconnector + "&edit_pw_cpuconnector=" + edit_pw_cpuconnector + "&edit_pw_pciexconnector=" + edit_pw_pciexconnector + "&edit_pw_sataconnector=" + edit_pw_sataconnector;
  data += "&edit_pw_molexconnector=" + edit_pw_molexconnector + "&edit_pw_powerinput=" + edit_pw_powerinput + "&edit_pw_price=" + edit_pw_price + "&edit_pw_warranty=" + edit_pw_warranty + "&edit_pw_status=" + edit_pw_status + "&PWId=" + PWId + "&PWStatus=" + PWStatus;
  // alert(data)
  if (edit_pw_name != "" && edit_pw_brand != 0 && edit_pw_watt != 0 && edit_pw_price != "") {
    $.ajax({
          type: "POST",
          url: "modul/detailpw/process/chk_data_pro.php",
          cache: false,
          data: data,
          success: function(msg){
            // alert(msg)
            if (msg == "Y") {
              swal("Record results", "Save successfully.", "success");
              LoadPW();
            }else {
              swal("Record results", "Unsuccessful recording !", "error");
            }
            },
          error: function(){
          //
            },
          complete: function(){
          //
            }
        });
      }else {
        swal("Record results", "Please check the information.", "warning");
      }
}

function DelPW(PWId, PWName, PWStatus) {
  //alert(EmpId+' | '+EmpName)
    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: '<i class="fa fa-trash-o"></i> Delete Power Supply',
      message: "Confirm delete Power Supply : " + PWName + " Yes/No ? ",
      buttons: [{
        label: 'Yes',
        // no title as it is optional
        cssClass: 'btn-danger',
        action: function(dialogItself){
          var data = "PWId=" + PWId + "&PWStatus=" + PWStatus;
          $.ajax({
              url: "modul/detailpw/process/chk_data_pro.php",
              dataType: "html",
              type: 'POST', //I want a type as POST
              data: data,
              success: function(msg){
                //alert(msg);
                if(msg=="Y"){
                  dialogItself.close();
                  swal("Record results", "Delete successfully.", "success");
                  LoadPW();
                }else{
                  dialogItself.close();
                  swal("Record results", "Failed to delete !", "error");
                }
              },
              error: function() {

              }
            });
        }
      }, {
        label: 'No',
        action: function(dialogItself){
          dialogItself.close();
        }
      }],
      draggable: true,
      closable:false
    });
}

function DetailPW(PWId, PWName) {
  BootstrapDialog.show({
    type: BootstrapDialog.TYPE_PRIMARY,
    size: BootstrapDialog.SIZE_WIDE,
    title: '<i class="glyphicon glyphicon-list-alt"></i> Detail : ' + PWName ,
    // message: $('<div></div>').load('modul/detailcpu/view/view_img.php'),
    message: $('<div></div>').load('modul/detailpw/view/view_img.php',{PWId:PWId}),
    buttons: [{
      label: 'Cancel',
      action: function(dialogItself){
        dialogItself.close();
      }
    }],
    draggable: true,
    closable:false
  });
}


//
// End Detail PW
//
function comingsoon() {
  swal("coming soon", "", "warning");

}


//
// ADD Spec Computer
//
function LoadData(StatusData) {
  if (StatusData == 'cpu') {
    var idmbsocketselect = $("#idmbsocketselect").val();
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData, idmbsocketselect:idmbsocketselect});
  }else if (StatusData == 'mb') {
    var idcpusocketselect = $("#idcpusocketselect").val();
    var idramselect = $("#idramselect").val();
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData, idcpusocketselect:idcpusocketselect, idramselect:idramselect});
  }else if (StatusData == 'vga') {
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
  }else if (StatusData == 'ram') {
    var idmbselect = $("#idmbselect").val();
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData, idmbselect:idmbselect});
  }else if (StatusData == 'hdd') {
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
  }else if (StatusData == 'hdd2') {
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
  }else if (StatusData == 'hdd3') {
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
  }else if (StatusData == 'pw') {
    $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
  }
}


//
// CPU
//
function AddCPUSpec(CPUIdSocket, CPUImg, CPUName, CPUPriceCom, CPUPrice) {
  document.getElementById("imgcpu").src = "upload/imagesCPU/" + CPUImg;
  $('#namecpu').html(CPUName);
  $('#pricecpu').html(CPUPriceCom);
  $("#varpricecpu").val(CPUPrice);
  $("#idcpusocketselect").val(CPUIdSocket);
  $("#cpushow").show();
  $("#cpuselect").hide();
  chkNum();
}

function DelCPUSpec(StatusData) {
  document.getElementById("imgcpu").src = "";
  $('#namecpu').html();
  $('#pricecpu').html();
  $("#varpricecpu").val(0);
  $("#idcpusocketselect").val("");
  $("#cpushow").hide();
  $("#cpuselect").show();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectChipCPU() {
  var count_se_chip = $("#count_se_chip").val();
  var Select_chip = "";
  var numselectcpu = 0;
  var StatusData = $("#StatusData").val();
  for (var i = 1; i <= count_se_chip; i++) {
    if ($("#select_chipcpu"+i).is(':checked')){
      if (Select_chip == "") {
        Select_chip = $("#select_chipcpu"+i).val();
        numselectcpu += 1;
      }else {
        Select_chip = Select_chip + ',' + $("#select_chipcpu"+i).val();
        numselectcpu += 1;
      }
    }
  }

  $.post("modul/accessory/process/chk_series_cpu.php",
    {
      Select_chip : Select_chip,
      numselectcpu : numselectcpu
    },
  function(data){
      $("#seriescpu").html(data);
	});

  $.post("modul/accessory/process/chk_socket_cpu.php",
    {
      Select_chip : Select_chip,
      numselectcpu : numselectcpu
    },
  function(data){
      $("#socketcpu").html(data);
	});
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,numselectcpu:numselectcpu,Select_chip:Select_chip});
}

function SelectSeriesCPU() {
  var seriescpu = $("#seriescpu").val();
  var StatusData = $("#StatusData").val();
  var count_se_chip = $("#count_se_chip").val();
  var Select_chip = "";
  var numselectcpu = 0;
  var socketcpu = $("#socketcpu").val();
    for (var i = 1; i <= count_se_chip; i++) {
      if ($("#select_chipcpu"+i).is(':checked')){
        if (Select_chip == "") {
          Select_chip = $("#select_chipcpu"+i).val();
          numselectcpu += 1;
        }else {
          Select_chip = Select_chip + ',' + $("#select_chipcpu"+i).val();
          numselectcpu += 1;
        }
      }
    }
  $.post("modul/accessory/process/chk_socket_cpu.php",
    {
      seriescpu : seriescpu
    },
  function(data){
      $("#socketcpu").html(data);
	});
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,seriescpu:seriescpu,Select_chip:Select_chip,numselectcpu:numselectcpu,socketcpu:socketcpu});
}

function SelectSocketCPU() {
  var socketcpu = $("#socketcpu").val();
  var StatusData = $("#StatusData").val();
  var count_se_chip = $("#count_se_chip").val();
  var Select_chip = "";
  var numselectcpu = 0;
  var seriescpu = $("#seriescpu").val();
    for (var i = 1; i <= count_se_chip; i++) {
      if ($("#select_chipcpu"+i).is(':checked')){
        if (Select_chip == "") {
          Select_chip = $("#select_chipcpu"+i).val();
          numselectcpu += 1;
        }else {
          Select_chip = Select_chip + ',' + $("#select_chipcpu"+i).val();
          numselectcpu += 1;
        }
      }
    }
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,socketcpu:socketcpu,Select_chip:Select_chip,numselectcpu:numselectcpu});
}


//
// MB
//
function AddMBSpec(MBId, MBImg, MBName, MBPriceCom, MBPrice, MBIdSocket) {
  document.getElementById("imgmb").src = "upload/imagesMB/" + MBImg;
  $('#namemb').html(MBName);
  $('#pricemb').html(MBPriceCom);
  $("#varpricemb").val(MBPrice);
  $("#idmbselect").val(MBId);
  $("#idmbsocketselect").val(MBIdSocket);
  $("#mbshow").show();
  $("#mbselect").hide();
  chkNum();
}

function DelMBSpec(StatusData) {
  document.getElementById("imgmb").src = "";
  $('#namemb').html();
  $('#pricemb').html();
  $("#varpricemb").val(0);
  $("#idmbselect").val("");
  $("#idmbsocketselect").val("");
  $("#mbshow").hide();
  $("#mbselect").show();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectBrandMB() {
  var socketmb = $("#socketmb").val();
  var count_se_brandmb = $("#count_se_brandmb").val();
  var Select_brandmb = "";
  var numselectbrandmb = 0;
  var StatusData = $("#StatusData").val();

  for (var i = 1; i <= count_se_brandmb; i++) {
    if ($("#select_brandmb"+i).is(':checked')){
      if (Select_brandmb == "") {
        Select_brandmb = $("#select_brandmb"+i).val();
        numselectbrandmb += 1;
      }else {
        Select_brandmb = Select_brandmb + ',' + $("#select_brandmb"+i).val();
        numselectbrandmb += 1;
      }
    }
  }
    $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,numselectbrandmb:numselectbrandmb,Select_brandmb:Select_brandmb,socketmb:socketmb});
}

function SelectSocketMB() {
  var socketmb = $("#socketmb").val();
  var count_se_brandmb = $("#count_se_brandmb").val();
  var Select_brandmb = "";
  var numselectbrandmb = 0;
  var StatusData = $("#StatusData").val();

  for (var i = 1; i <= count_se_brandmb; i++) {
    if ($("#select_brandmb"+i).is(':checked')){
      if (Select_brandmb == "") {
        Select_brandmb = $("#select_brandmb"+i).val();
        numselectbrandmb += 1;
      }else {
        Select_brandmb = Select_brandmb + ',' + $("#select_brandmb"+i).val();
        numselectbrandmb += 1;
      }
    }
  }
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,numselectbrandmb:numselectbrandmb,Select_brandmb:Select_brandmb,socketmb:socketmb});
}


// VGA
function AddVGASpec(VGAImg, VGAName, VGAPriceCom, VGAPrice) {
  document.getElementById("imgvga").src = "upload/imagesVGA/" + VGAImg;
  $('#namevga').html(VGAName);
  $('#pricevga').html(VGAPriceCom);
  $("#varpricevga").val(VGAPrice);
  $("#vgashow").show();
  $("#vgaselect").hide();
  chkNum();
}

function DelVGASpec(StatusData) {
  document.getElementById("imgvga").src = "";
  $('#namevga').html();
  $('#pricevga').html();
  $("#varpricevga").val(0);
  $("#vgashow").hide();
  $("#vgaselect").show();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectChipsetVGA() {
  var count_se_chipsetvga = $("#count_se_chipsetvga").val();
  var Select_chipsetvga = "";
  var numselectvga = 0;
  var StatusData = $("#StatusData").val();
  for (var i = 1; i <= count_se_chipsetvga; i++) {
    if ($("#select_chipsetvga"+i).is(':checked')){
      if (Select_chipsetvga == "") {
        Select_chipsetvga = $("#select_chipsetvga"+i).val();
        numselectvga += 1;
      }else {
        Select_chipsetvga = Select_chipsetvga + ',' + $("#select_chipsetvga"+i).val();
        numselectvga += 1;
      }
    }
  }

  $.post("modul/accessory/process/chk_series_vga.php",
    {
      Select_chipsetvga : Select_chipsetvga,
      numselectvga : numselectvga
    },
  function(data){
      $("#seriesvga").html(data);
	});
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,numselectvga:numselectvga,Select_chipsetvga:Select_chipsetvga});
}

function SelectSseriesVGA() {
  var seriesvga = $("#seriesvga").val();
  var count_se_chipsetvga = $("#count_se_chipsetvga").val();
  var Select_chipsetvga = "";
  var numselectvga = 0;
  var StatusData = $("#StatusData").val();
    for (var i = 1; i <= count_se_chipsetvga; i++) {
      if ($("#select_chipsetvga"+i).is(':checked')){
        if (Select_chipsetvga == "") {
          Select_chipsetvga = $("#select_chipsetvga"+i).val();
          numselectvga += 1;
        }else {
          Select_chipsetvga = Select_chipsetvga + ',' + $("#select_chipsetvga"+i).val();
          numselectvga += 1;
        }
      }
    }
  $("#brandvga").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,seriesvga:seriesvga,Select_chipsetvga:Select_chipsetvga,Select_chipsetvga:Select_chipsetvga});
}

function SelectBrandVGA() {
  var brandvga = $("#brandvga").val();
  var count_se_chipsetvga = $("#count_se_chipsetvga").val();
  var Select_chipsetvga = "";
  var numselectvga = 0;
  var StatusData = $("#StatusData").val();
    for (var i = 1; i <= count_se_chipsetvga; i++) {
      if ($("#select_chipsetvga"+i).is(':checked')){
        if (Select_chipsetvga == "") {
          Select_chipsetvga = $("#select_chipsetvga"+i).val();
          numselectvga += 1;
        }else {
          Select_chipsetvga = Select_chipsetvga + ',' + $("#select_chipsetvga"+i).val();
          numselectvga += 1;
        }
      }
    }
  $("#seriesvga").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,brandvga:brandvga,Select_chipsetvga:Select_chipsetvga,Select_chipsetvga:Select_chipsetvga});
}


//
// RAM
//
function AddRAMSpec(RAMImg, RAMName, RAMPriceCom, RAMPrice) {
  document.getElementById("imgram").src = "upload/imagesRAM/" + RAMImg;
  $('#nameram').html(RAMName);
  $('#priceram').html(RAMPriceCom);
  $("#varpriceram").val(RAMPrice);
  $("#ramshow").show();
  $("#ramselect").hide();
  chkNum();
}

function DelRAMSpec(StatusData) {
  document.getElementById("imgram").src = "";
  $('#nameram').html();
  $('#priceram').html();
  $("#varpriceram").val(0);
  $("#ramshow").hide();
  $("#ramselect").show();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectTypeRam() {
  var count_se_typeram = $("#count_se_typeram").val();
  var Select_typeram = "";
  var numselecttyperam = 0;
  var StatusData = $("#StatusData").val();
  for (var i = 1; i <= count_se_typeram; i++) {
    if ($("#select_typeram"+i).is(':checked')){
      if (Select_typeram == "") {
        Select_typeram = $("#select_typeram"+i).val();
        numselecttyperam += 1;
      }else {
        Select_typeram = Select_typeram + ',' + $("#select_typeram"+i).val();
        numselecttyperam += 1;
      }
    }
  }

  $.post("modul/accessory/process/chk_type_ram.php",
    {
      Select_typeram : Select_typeram,
      numselecttyperam : numselecttyperam
    },
  function(data){
      $("#busram").html(data);
	});
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,numselecttyperam:numselecttyperam,Select_typeram:Select_typeram});
}

function SelectBusRam() {
  var busram = $("#busram").val();
  var count_se_typeram = $("#count_se_typeram").val();
  var Select_typeram = "";
  var numselecttyperam = 0;
  $("#brandram").val(0);
  var StatusData = $("#StatusData").val();
  for (var i = 1; i <= count_se_typeram; i++) {
    if ($("#select_typeram"+i).is(':checked')){
      if (Select_typeram == "") {
        Select_typeram = $("#select_typeram"+i).val();
        numselecttyperam += 1;
      }else {
        Select_typeram = Select_typeram + ',' + $("#select_typeram"+i).val();
        numselecttyperam += 1;
      }
    }
  }
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,busram:busram,Select_typeram:Select_typeram,numselecttyperam:numselecttyperam});
}

function SelectBrandRam() {
  var brandram = $("#brandram").val();
  var count_se_typeram = $("#count_se_typeram").val();
  var Select_typeram = "";
  var numselecttyperam = 0;
  var StatusData = $("#StatusData").val();
  for (var i = 1; i <= count_se_typeram; i++) {
    if ($("#select_typeram"+i).is(':checked')){
      if (Select_typeram == "") {
        Select_typeram = $("#select_typeram"+i).val();
        numselecttyperam += 1;
      }else {
        Select_typeram = Select_typeram + ',' + $("#select_typeram"+i).val();
        numselecttyperam += 1;
      }
    }
  }
  $("#busram").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,brandram:brandram,Select_typeram:Select_typeram,numselecttyperam:numselecttyperam});
}


//
// HDD
//
function AddHDDSpec(HDDImg, HDDName, HDDPriceCom, HDDPrice) {
  document.getElementById("imghdd").src = "upload/imagesHDD/" + HDDImg;
  $('#namehdd').html(HDDName);
  $('#pricehdd').html(HDDPriceCom);
  $("#varpricehdd").val(HDDPrice);
  $("#hddshow").show();
  $("#hddselect").hide();
  $("#hddselect2").show();
  chkNum();
}

function DelHDDSpec(StatusData) {
  document.getElementById("imghdd").src = "";
  $('#namehdd').html();
  $('#pricehdd').html();
  $("#varpricehdd").val(0);
  $("#hddshow").hide();
  $("#hddselect").show();
  $("#hddselect2").hide();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectTypeHDD() {
  var typehdd = $("#typehdd").val();
  var StatusData = $("#StatusData").val();
  $("#capacityhdd").val(0);
  $("#brandHDD").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,typehdd:typehdd});
}

function SelectCapacityHDD() {
  var capacityhdd = $("#capacityhdd").val();
  var StatusData = $("#StatusData").val();
  $("#typehdd").val(0);
  $("#brandHDD").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,capacityhdd:capacityhdd});
}

function SelectBrandPW() {
  var brandHDD = $("#brandHDD").val();
  var StatusData = $("#StatusData").val();
  $("#typehdd").val(0);
  $("#capacityhdd").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,brandHDD:brandHDD});
}


//
// HDD2
//
function AddHDDSpec2(HDDImg2, HDDName2, HDDPriceCom2, HDDPrice2) {
  document.getElementById("imghdd2").src = "upload/imagesHDD/" + HDDImg2;
  $('#namehdd2').html(HDDName2);
  $('#pricehdd2').html(HDDPriceCom2);
  $("#varpricehdd2").val(HDDPrice2);
  $("#hddshow2").show();
  $("#hddselect2").hide();
  $("#hddselect3").show();
  chkNum();
}

function DelHDDSpec2(StatusData) {
  document.getElementById("imghdd2").src = "";
  $('#namehdd2').html();
  $('#pricehdd2').html();
  $("#varpricehdd2").val(0);
  $("#hddshow2").hide();
  $("#hddselect2").show();
  $("#hddselect3").hide();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectTypeHDD2() {
  var typehdd2 = $("#typehdd2").val();
  var StatusData = $("#StatusData").val();
  $("#capacityhdd2").val(0);
  $("#brandHDD2").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,typehdd2:typehdd2});
}

function SelectCapacityHDD2() {
  var capacityhdd2 = $("#capacityhdd2").val();
  var StatusData = $("#StatusData").val();
  $("#typehdd2").val(0);
  $("#brandHDD2").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,capacityhdd2:capacityhdd2});
}

function SelectBrandPW2() {
  var brandHDD2 = $("#brandHDD2").val();
  var StatusData = $("#StatusData").val();
  $("#typehdd2").val(0);
  $("#capacityhdd2").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,brandHDD2:brandHDD2});
}


//
// HDD3
//
function AddHDDSpec3(HDDImg3, HDDName3, HDDPriceCom3, HDDPrice3) {
  document.getElementById("imghdd3").src = "upload/imagesHDD/" + HDDImg3;
  $('#namehdd3').html(HDDName3);
  $('#pricehdd3').html(HDDPriceCom3);
  $("#varpricehdd3").val(HDDPrice3);
  $("#hddshow3").show();
  $("#hddselect3").hide();
  chkNum();
}

function DelHDDSpec3(StatusData) {
  // alert("TT")
  document.getElementById("imghdd3").src = "";
  $('#namehdd3').html();
  $('#pricehdd3').html();
  $("#varpricehdd3").val(0);
  $("#hddshow3").hide();
  $("#hddselect3").show();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectTypeHDD3() {
  var typehdd3 = $("#typehdd3").val();
  var StatusData = $("#StatusData").val();
  $("#capacityhdd3").val(0);
  $("#brandHDD3").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,typehdd3:typehdd3});
}

function SelectCapacityHDD3() {
  var capacityhdd3 = $("#capacityhdd3").val();
  var StatusData = $("#StatusData").val();
  $("#typehdd3").val(0);
  $("#brandHDD3").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,capacityhdd3:capacityhdd3});
}

function SelectBrandPW3() {
  var brandHDD3 = $("#brandHDD3").val();
  var StatusData = $("#StatusData").val();
  $("#typehdd3").val(0);
  $("#capacityhdd3").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,brandHDD3:brandHDD3});
}


//
// PW
//
function AddPWSpec(PWImg, PWName, PWPriceCom, PWPrice) {
  document.getElementById("imgpw").src = "upload/imagesPW/" + PWImg;
  $('#namepw').html(PWName);
  $('#pricepw').html(PWPriceCom);
  $("#varpricepw").val(PWPrice);
  $("#pwshow").show();
  $("#pwselect").hide();
  chkNum();
}

function DelPWSpec(StatusData) {
  document.getElementById("imgpw").src = "";
  $('#namepw').html();
  $('#pricepw').html();
  $("#varpricepw").val(0);
  $("#pwshow").hide();
  $("#pwselect").show();
  chkNum();
  $("#show_accessory").load("modul/accessory/view/show_main.php",{StatusData:StatusData});
}

function SelectWattPW() {
  var wattpw = $("#wattpw").val();
  var StatusData = $("#StatusData").val();
  $("#brandpw").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,wattpw:wattpw});
}

function SelectBrandPW() {
  var brandpw = $("#brandpw").val();
  var StatusData = $("#StatusData").val();
  $("#wattpw").val(0);
  $("#detail_data").load("modul/accessory/view/show_data.php",{StatusData:StatusData,brandpw:brandpw});
}


//

function addCommas(nStr)
{
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  // x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  // display
    $("#total2").hide();
    $("#total1").show();
    $("#totaltitle").html('Total');
    $("#TotelPrice").html(x1 + '.-');
  // alert(x1)
}

function chkNum()
{
  var varpricecpu = parseFloat($("#varpricecpu").val());
  var varpricemb = parseFloat($("#varpricemb").val());
  var varpricevga = parseFloat($("#varpricevga").val());
  var varpriceram = parseFloat($("#varpriceram").val());
  var varpricehdd = parseFloat($("#varpricehdd").val());
  var varpricehdd2 = parseFloat($("#varpricehdd2").val());
  var varpricehdd3 = parseFloat($("#varpricehdd3").val());
  var varpricepw = parseFloat($("#varpricepw").val());

  var num = varpricecpu + varpricemb + varpricevga + varpriceram + varpricehdd + varpricehdd2 + varpricehdd3 + varpricepw;
  numPrice = addCommas(num.toFixed(2));
  // alert(varpricecpu+' | '+varpricemb+' | '+varpricevga+' | '+varpriceram+' | '+varpricehdd+' | '+varpricepw+' | '+num)
}
