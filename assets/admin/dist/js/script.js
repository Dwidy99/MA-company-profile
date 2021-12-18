$(document).ready(function () {
	// Sweetalert2
	const flashdata = $(".data-flashdata").data("flashdata");
	if (flashdata) {
		Swal.fire({
			title: "Sukses!",
			text: flashdata,
			icon: "success",
			confirmButtonText: "Ok",
		});
	}

	const flashdataDanger = $(".data-flashdata-danger").data("flashdata");
	console.log(flashdataDanger);
	if (flashdataDanger) {
		Swal.fire({
			title: "Peringatan!",
			text: flashdataDanger,
			icon: "warning",
			confirmButtonText: "Ok",
		});
	}

	// delete button
	$(".tbl-delete").on("click", function (e) {
		e.preventDefault();
		const href = $(this).attr("href");
		Swal.fire({
			title: "Apakah Anda yakin?",
			text: "Data yang Anda hapus tidak bisa kembali!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!",
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});
	// End Sweetalert2

	// DataTable
	$("#example2").DataTable();
	$("#example1")
		.DataTable({
			responsive: true,
			lengthChange: false,
			autoWidth: false,
			buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
		})
		.buttons()
		.container()
		.appendTo("#example1_wrapper .col-md-6:eq(0)");
	// End DataTable

	// TinyMCE
	tinymce.init({
		selector: ".tiny",
		height: 500,
		plugins:
			"print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern help",
		toolbar:
			"formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | removeformat",
		visual_table_class: "tiny-table",
		fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
	});
});
// End TinyMCE

// Preview gambar
function tampilkanPreview(img, idpreview) {
	//membuat objek gambar
	console.log(img);
	var gb = img.files;
	//loop untuk merender gambar
	for (var i = 0; i < gb.length; i++) {
		//bikin variabel
		var gbPreview = gb[i];
		var imageType = /image.*/;
		var preview = document.getElementById(idpreview);
		var reader = new FileReader();
		if (gbPreview.type.match(imageType)) {
			//jika tipe data sesuai
			preview.file = gbPreview;
			reader.onload = (function (element) {
				return function (e) {
					element.src = e.target.result;
				};
			})(preview);
			//membaca data URL gambar
			reader.readAsDataURL(gbPreview);
		} else {
			//jika tipe data tidak sesuai
			alert(
				"Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg."
			);
		}
	}
}
