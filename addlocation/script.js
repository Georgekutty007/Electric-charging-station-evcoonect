let mapOptions = {
    center: [11.30236, 75.87471],
    zoom: 10,
  };
  
  function reverseGeocode(latlng) {
    fetch(
      `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latlng.lat}&lon=${latlng.lng}`
    )
      .then((response) => response.json())
      .then((data) => {
        // Update the state and address fields in the form
        document.getElementById("state").value = data.address.state;
        document.getElementById("address").value = data.display_name;
      })
      .catch((error) => console.error(error));
  }
  
  let map = new L.map("map", mapOptions);
  
  let layer = new L.TileLayer(
    "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
  );
  map.addLayer(layer);
  
  let iconOptions = {
    title: "YOU",
    draggable: true,
  };
  
  let marker = new L.Marker([11.30236, 75.87471], iconOptions);
  
  map.on("click", (event) => {
    if (marker !== null) {
      map.removeLayer(marker);
    }
    marker = L.marker([event.latlng.lat, event.latlng.lng], iconOptions).addTo(
      map
    );
    document.getElementById("latitude").value = event.latlng.lat;
    document.getElementById("longitude").value = event.latlng.lng;
  
    reverseGeocode(event.latlng);
  });
  
  fetch("data.json")
    .then((response) => response.json())
    .then((data) => {
      // Loop through the locations and add markers to the map
      data.forEach((location) => {
        const marker = L.marker([location.latitude, location.longitude]).addTo(
          map
        );
        marker.bindPopup(
          `<b>${location.name}</b><br>Latitude: ${location.latitude}<br>Longitude: ${location.longitude}`
        );
      });
    })
    .catch((error) => console.error(error));
  