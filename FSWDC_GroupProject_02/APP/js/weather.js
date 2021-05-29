/** @format */

// get search engine
function showTemperature(response) {
	let currentTemp = document.querySelector("#current-temperature");
	celciusTemperature = Math.round(response.data.main.temp);
	currentTemp.innerHTML = celciusTemperature;
	let cityname = document.querySelector("#city");
	cityname.innerHTML = response.data.name;
	let iconElement = document.querySelector("#icon");
	iconElement.setAttribute(
		"src",

		`http://openweathermap.org/img/wn/${response.data.weather[0].icon}@2x.png`
	);
	response.data.weather[0].icon;
	iconElement.setAttribute("alt", response.data.weather[0].description);
}

function showCurrent(position) {
	let lat = position.coords.latitude;
	let lon = position.coords.longitude;
	let apiKey = "b61934cde5be0cecf7eae593bdfe5740";
	let unit = "metric";
	let url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=${unit}`;
	axios.get(url).then(showTemperature);
}

function currentPosisiton() {
	navigator.geolocation.getCurrentPosition(showCurrent);
}

currentPosisiton();
