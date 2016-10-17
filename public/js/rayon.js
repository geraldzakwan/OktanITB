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

function setRayon(str, valueArray) {
	document.getElementById(str).innerHTML = multipleOptionString(valueArray).toString();
}

function selectRayon(value, id) {
	if(id === "editasalprovinsi") {
		if (value==="") {
			var valueArray = ["Aceh", "Bali", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi",
			"Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", 
			"Kalimantan Tengah", "Kalimantan Timur", "Kalimantan Utara", "Kep Bangka Belitung",
			"Kep Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur",
			"Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tenggara",
			"Sulawesi Utara", "Sulawesi Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta"];
			setRayon(id, valueArray);
			value = "Aceh";
		}
	} 
	else if (id === 'asalprovinsi'){		
		var valueArray = ["Aceh", "Bali", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi",
		"Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", 
		"Kalimantan Tengah", "Kalimantan Timur", "Kalimantan Utara", "Kep Bangka Belitung",
		"Kep Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur",
		"Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tenggara",
		"Sulawesi Utara", "Sulawesi Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta"];
		
		var index = valueArray.indexOf(value);
		valueArray.splice(index, 1);
		valueArray.unshift(value);

		setRayon(id, valueArray);
	}

	//document.getElementById("rayon").innerHTML = "<option value='Aceh'> Aceh </option>";		
	if (value === "Sumatera Utara" || value === "Aceh") {
		var valueArray = ["Medan"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Sumatera Barat") {
		var valueArray = ["Padang"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Riau" || value === "Kep Riau") {
		var valueArray = ["Padang"];
		setRayon("rayon", valueArray);
	} 
	else if (value === "Sumatera Selatan") {
		var valueArray = ["Palembang"];
		setRayon("rayon", valueArray);
	} 
	else if (value === "Jambi") {
		var valueArray = ["Palembang"];
		setRayon("rayon", valueArray);
	} 
	else if (value === "Bengkulu") {
		var valueArray = ["Palembang"];
		setRayon("rayon", valueArray);
	} 
	else if (value === "Kep Bangka Belitung") {
		var valueArray = ["Palembang"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Lampung") {
		var valueArray = ["Lampung"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Banten") {
		var valueArray = ["Serang", "Tangerang"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Jakarta") {
		var valueArray = ["Jakarta"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Jawa Barat") {
		var valueArray = ["Bogor", "Karawang", "Cirebon", "Tasikmalaya", "Bandung"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Jawa Tengah") {
		var valueArray = ["Purwokerto", "Solo"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Yogyakarta") {
		var valueArray = ["Yogyakarta"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Jawa Timur") {
		var valueArray = ["Surabaya", "Malang", "Banyuwangi"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Bali") {
		var valueArray = ["Bali"];
		setRayon("rayon", valueArray);
	}
	else if (value === "Kalimantan Barat" || value === "Kalimantan Tengah" || value === "Kalimantan Timur" || value === "Kalimantan Utara" || value === "Kalimantan Selatan") {
		var valueArray = ["Samarinda"];
		setRayon("rayon", valueArray);
	}
	else if (value === "") {
		document.getElementById("rayon").innerHTML = "<option value=''> Pilih rayon </option>";	
	}
	else {
		//Boleh semua rayon
		//document.getElementById("rayon").innerHTML = "<option value='" + value + "'>" + value + "</option>" ;		
		var valueArray = ["Medan", "Padang", "Palembang", "Lampung", "Serang", "Tangerang",
						  "Jakarta", "Bogor", "Karawang", "Cirebon", "Tasikmalaya", "Bandung",
						  "Purwokerto", "Solo", "Yogyakarta", "Surabaya", "Malang", "Banyuwangi",
						  "Bali", "Samarinda"];
		setRayon("rayon", valueArray);
	}
}