<style>
            .holder {
                height: 120px;
                width: 120px;
                border: 2px solid black;
            }
            img {
                max-width: 120px;
                max-height: 120px;
                min-width: 120px;
                min-height: 120px;
            }
            input[type="file"] {
                margin-top: 5px;
            }
            .heading {
                font-family: Montserrat;
                font-size: 45px;
                color: green;
            }
        </style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
            echo form_open_multipart('backend/Shops/update', ['autocomplete' => false, 'id' => 'edit_worker'
                ,'method'=>'post'], ['type' => $this->url_encrypt->encode('tbl_workers'),
                'id'=> $Product[0]->id])
                ?>
              <div class="form-group row">
                    <div class="col-md-3">
                    <label for="name">Shop Name *</label>
                        <input class="form-control" type="text" Placeholder="Shop Name" value=" <?= $Product[0]->first_name ?>"  name="shop_name" required
                            id="name">
                    </div>
                    <div class="col-md-3">
                    <label for="whatsapp_no">Mobile No.</label>
                        <input class="form-control" type="text" value=" <?= $Product[0]->mobile ?>" Placeholder="Mobile No." name="whatsapp_no"
                            id="whatsapp_no">
                    </div>
                    <div class="col-md-3">
                    <label for="email">Email Id</label>
                        <input class="form-control" type="text" Placeholder="Email Id" value=" <?= $Product[0]->email_id ?>" name="email"
                            id="email">
                    </div>
                    <div class="col-md-3">
                    <label for="password">Password</label>
                        <input class="form-control" type="text" Placeholder="Password" value=" <?= $Product[0]->password ?>" name="password"
                            id="password">
                    </div>
                </div>
               
                <div class="form-group row">
                <div class="col-md-6">
                    <label for="address">Address</label>
                        <input class="form-control" type="text" Placeholder="Address"   value=" <?= $Product[0]->contact_us ?>" name="address"
                        id="pac-input" >
                        <div id="map"></div>
                    </div>
                   
                </div>
              
                <div class="form-group row">
                   
                <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview" src="#" style="display:none"  />
            </div>
                    <label for="image">Shop Image *</label>
                        <input class="form-control" type="file" name="product_image" id="image">
                    </div>
                    <div class="col-md-2">
                    <div class="holder">
                <img id="imgPreview2" src="#" style="display:none"  />
            </div>
                    <label for="image2">Qr Image *</label>
                        <input class="form-control" type="file" name="qr_image" id="image2">
                    </div>
                   
                </div>

                <div class="form-group mb-0">
                    <div>
                        <?php
                        echo form_submit('submit', 'Update', ['class' => 'btn btn-primary waves-effect waves-light mr-1']);
                       
                        ?>
                         <a href="<?= base_url('backend/Shops')?>" class="btn btn-secondary waves-effect">Cancel</a>
                    </div>
                </div>
                <?php
            echo form_close();
            ?>
            </div>
        </div><!-- end col -->
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCheqXXLZiGbGYObQTX6HkOTjDklpBPCw0&callback=initAutocomplete&libraries=places&v=weekly"
      defer></script>
    <script>

            $(document).ready(() => {
                <?php if($Product[0]->logo){ ?>
                    $("#imgPreview").attr("src",'<?= base_url('uploads/images/').$Product[0]->logo ?>');
                    $("#imgPreview").show()
                    <?php } ?>
                    <?php if($Product[0]->qr_image){ ?>
                    $("#imgPreview2").attr("src",'<?= base_url('uploads/images/').$Product[0]->qr_image ?>');
                    $("#imgPreview2").show()
                    <?php } ?>
                $("#image").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                              $('#imgPreview').show()
                        };
                        reader.readAsDataURL(file);
                    }
                });

                   
                $("#image2").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview2")
                              .attr("src", event.target.result);
                              $('#imgPreview2').show()
                        };
                        reader.readAsDataURL(file);
                    }
                });
             
            });
            function initAutocomplete() {
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 19.148575, lng:  72.989941 },
    zoom: 13,
    mapTypeId: "roadmap",
  });
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  let markers = [];

  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();

    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }

      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };

      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        }),
      );
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}

window.initAutocomplete = initAutocomplete;
        </script>