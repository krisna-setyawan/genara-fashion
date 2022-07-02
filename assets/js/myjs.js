function hanyaAngka(evt) {
	var charCode = evt.which ? evt.which : event.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
	return true;
}

function hanyaHuruf(evt) {
	var charCode = evt.which ? evt.which : event.keyCode;
	if (
		(charCode < 65 || charCode > 90) &&
		(charCode < 97 || charCode > 122) &&
		charCode > 32
	)
		return false;
	return true;
}

function format_rupiah(angka) {
	var number_string = angka.toString(),
		sisa = number_string.length % 3,
		rupiah = number_string.substr(0, sisa),
		ribuan = number_string.substr(sisa).match(/\d{3}/g);

	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	return rupiah;
}

// FORM VALIDATION ---------------------------------------------------------------------------------
(function () {
	"use strict";
	window.addEventListener(
		"load",
		function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName("needs-validation");
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener(
					"submit",
					function (event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add("was-validated");
					},
					false
				);
			});
		},
		false
	);
})();
// FORM VALIDATION ---------------------------------------------------------------------------------

// FORM VALIDATION TAMBAH LIST BARANG PENJUALAN ----------------------------------------------------
function validasi_add_list_penjualan() {
	if ($("#id_penjualan").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "id_penjualan kosong!",
		});
	} else if ($("#var_id_produk").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "Produk Belum dipilih!",
		});
	} else if ($("#qty").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "QTY Produk belum diisi!",
		});
	} else if ($("#var_hpp_produk").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "hpp produk kosong!",
		});
	} else if ($("#var_hpp_sablon").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "hpp sablon kosong!",
		});
	} else if ($("#var_harga_jual").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "harga jual kosong!",
		});
	} else if ($("#var_total_harga").val() == "") {
		Swal.fire({
			icon: "error",
			title: "Gagal...",
			text: "harga jual kosong!",
		});
	} else {
		tambahListBarang();
	}
}
// FORM VALIDATION TAMBAH LIST BARANG PENJUALAN ----------------------------------------------------

$(".input-logo").on("change", function () {
	let fileName = $(this).val().split("\\").pop();
	$(this).next(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function () {
	$("#logo").change(function () {
		bacaGambar(this);
	});
});

function bacaGambar(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$("#logo_toko").attr("src", e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}
