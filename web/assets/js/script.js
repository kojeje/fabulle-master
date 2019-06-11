//Masquer les popups par défault
function hideAdmin() {
    // Au chargement de la page
    if (document.getElementById("body").onload) {
//  Masquer les champs facultatifs au chargement du formulaire (onload)
        //popups
        document.getElementById("shows-admin-menu").style.display = 'none';
        document.getElementById('events-admin-menu').style.display = 'none';
        document.getElementById('places-admin-menu').style.display = 'none';
        // Slider
        document.getElementById("slider").style.display = 'none';
        // Video
        document.getElementById("video").style.display = 'none';

    }
}

//Déclencher l'affichage du menu d'adminitration "spectacles"
function ShowAdminPopup() {
    if (document.getElementById("popup-header-shows-open").onclick) {
        document.getElementById("shows-admin-menu").style.display = 'block';
    }
}

//Déclencher l'affichage du menu d'adminitration "dates"
    function LeEventAdminPopup() {
        if (document.getElementById("popup-header-events-open").onclick) {
            document.getElementById("events-admin-menu").style.display = 'block';
        }
    }

//Déclencher l'affichage du menu d'adminitration lieux"
    function PlaceAdminPopup() {
            if (document.getElementById("popup-header-places-open").onclick) {
                document.getElementById("places-admin-menu").style.display = 'block';
            }
        }


//Afficher le bloc de champs de formulaire "slider"
    function ShowHideSlider() {
//  Si checkbox général est ok
        if (document.getElementById("sl_boolean").checked) {
            //afficher les champs sliders
            document.getElementById("slider").style.display = 'block';
//      Si checkbox Image 2 est ok
            if (document.getElementById("img-field-2").checked) {
                // afficher champs Image 2
                document.getElementById("img-sl-2").style.display = 'block';
//          Sinon
            } else {
                //Masquer ChampImage 2
                document.getElementById("img-sl-2").style.display = 'none';
            }
//      Si checkbox Image 3 est ok
            if (document.getElementById("img-field-3").checked) {
                // afficher champs Image 3
                document.getElementById("img-sl-3").style.display = 'block';
//      Sinon
            } else {
                //Masquer ChampImage 3
                document.getElementById("img-sl-3").style.display = 'none';

            }
//      Si checkbo@x Image 4 est ok
            if (document.getElementById("img-field-4").checked) {
                // afficher champs Image 4
                document.getElementById("img-sl-4").style.display = 'block';
//      Sinon
            } else {
                //Masquer ChampImage 4
                document.getElementById("img-sl-4").style.display = 'none';
            }
// Sinon
        } else {
//      Masquer le slider
            document.getElementById("slider").style.display = 'none';
            // Et les champs images
            document.getElementById("img-sl-2").style.display = 'none';
            document.getElementById("img-sl-3").style.display = 'none';
            document.getElementById("img-sl-4").style.display = 'none';
        }

    }

//Afficher le bloc de champs de formulaire "video"
    function ShowHideVideo() {
//  Si checkbox est ok
        if (document.getElementById("v_boolean").checked) {
            //  Afficher
            document.getElementById("video").style.display = 'block';
//  Sinon
        } else {
            //  Masquer
            document.getElementById("video").style.display = 'none';
        }
    }

// Masquer accès rapide au spectacles (X admin)
    function hideAdminShowPopup() {
//      Au clic sur la croix
        if (document.getElementById("popup-header-shows-close").onclick) {
            //Masquer
            document.getElementById("shows-admin-menu").style.display = 'none';
        }
    }

//Masquer accès rapide au évènements (X admin)
    function hideAdminLeEventPopup() {
//      Au clic sur la croix
        if (document.getElementById("popup-header-events-close").onclick) {
            //Masquer
            document.getElementById("events-admin-menu").style.display = 'none';

        }
    }

//Masquer accès rapide au lieux (X admin)
        function hideAdminPlacePopup() {
//      Au clic sur la croix
            if (document.getElementById("popup-header-places-close").onclick) {
                //Masquer
                document.getElementById("places-admin-menu").style.display = 'none';

            }
        }







