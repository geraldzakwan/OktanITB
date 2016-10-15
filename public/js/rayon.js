// Membuat field rayon

function singleOptionString(value) {
	var ret = "<option value='" + value + "'>" + value + "</option>";
	return ret;
}

function multipleOptionString(valueArray) {
	var ret = "";
	for (var i=0; i<valueArray.length; i++) {
		ret += singleOptionString(valueArray[i]);
	}
	return ret;
}

function setRayon(valueArray) {
	document.getElementById("rayon").innerHTML = multipleOptionString(valueArray).toString();
}

function selectRayon(value) {
	//document.getElementById("rayon").innerHTML = "<option value='Aceh'> Aceh </option>";		
	if (value === "Sumatera Utara" || value === "Aceh") {
		var valueArray = ["Medan"];
		setRayon(valueArray);
	}
	else if (value === "Sumatera Barat") {
		var valueArray = ["Padang"];
		setRayon(valueArray);
	}
	else if (value === "Riau" || value === "Kep Riau") {
		var valueArray = ["Padang"];
		setRayon(valueArray);
	} 
	else if (value === "Sumatera Selatan") {
		var valueArray = ["Palembang"];
		setRayon(valueArray);
	} 
	else if (value === "Jambi") {
		var valueArray = ["Palembang"];
		setRayon(valueArray);
	} 
	else if (value === "Bengkulu") {
		var valueArray = ["Palembang"];
		setRayon(valueArray);
	} 
	else if (value === "Kep Bangka Belitung") {
		var valueArray = ["Palembang"];
		setRayon(valueArray);
	}
	else if (value === "Lampung") {
		var valueArray = ["Lampung"];
		setRayon(valueArray);
	}
	else if (value === "Banten") {
		var valueArray = ["Serang", "Tangerang"];
		setRayon(valueArray);
	}
	else if (value === "Jakarta") {
		var valueArray = ["Jakarta"];
		setRayon(valueArray);
	}
	else if (value === "Jawa Barat") {
		var valueArray = ["Bogor", "Karawang", "Cirebon", "Tasikmalaya", "Bandung"];
		setRayon(valueArray);
	}
	else if (value === "Jawa Tengah") {
		var valueArray = ["Purwokerto", "Solo"];
		setRayon(valueArray);
	}
	else if (value === "Yogyakarta") {
		var valueArray = ["Yogyakarta"];
		setRayon(valueArray);
	}
	else if (value === "Jawa Timur") {
		var valueArray = ["Surabaya", "Malang", "Banyuwangi"];
		setRayon(valueArray);
	}
	else if (value === "Bali") {
		var valueArray = ["Bali"];
		setRayon(valueArray);
	}
	else if (value === "Kalimantan Barat" || value === "Kalimantan Tengah" || value === "Kalimantan Timur" || value === "Kalimantan Utara" || value === "Kalimantan Selatan") {
		var valueArray = ["Samarinda"];
		setRayon(valueArray);
	}
	else {
		//Boleh semua rayon
		//document.getElementById("rayon").innerHTML = "<option value='" + value + "'>" + value + "</option>" ;		
		var valueArray = ["Medan", "Padang", "Palembang", "Lampung", "Serang", "Tangerang",
						  "Jakarta", "Bogor", "Karawang", "Cirebon", "Tasikmalaya", "Bandung",
						  "Purwokerto", "Solo", "Yogyakarta", "Surabaya", "Malang", "Banyuwangi",
						  "Bali", "Samarinda"];
		setRayon(valueArray);
	}
}