// validateNIM.js

$(document).ready(function () {
	$("#nim").on("input", function () {
		var nim = $(this).val();

		// Lakukan validasi hanya jika NIM memiliki panjang lebih dari 0
		if (nim.length > 0) {
			$.ajax({
				type: "POST",
				url: "validate_nim.php", // Buat file PHP yang akan memproses validasi
				data: { nim: nim },
				success: function (response) {
					if (response === "exists") {
						$("#nim").addClass("is-invalid");
						$("#nim-error").text("NIM sudah ada dalam database.");
						$('#tambah-mahasiswa-form button[type="submit"]').prop(
							"disabled",
							true
						);
					} else {
						$("#nim").removeClass("is-invalid");
						$("#nim-error").text("");
						$('#tambah-mahasiswa-form button[type="submit"]').prop(
							"disabled",
							false
						);
					}
				},
			});
		}
	});
});
