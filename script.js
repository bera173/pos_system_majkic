function addToCart(meal_id) {
    // Pamti trenutni položaj na stranici
    localStorage.setItem('scrollPosition', window.scrollY);
    
    // AJAX poziv
    $.ajax({
        type: "POST",
        url: "upload_cart.php",
        data: { meal_id: meal_id },
        success: function(response) {
            // Reprodukcija zvuka kada je dodavanje jela uspešno
            var audio = new Audio('media/barcode.mp3');
            audio.play();
            
            // Ponovno učitavanje stranice nakon 1 sekunde
            setTimeout(function() {
                // Vraćanje na prethodni položaj na stranici nakon osvežavanja
                var scrollPosition = localStorage.getItem('scrollPosition');
                window.scrollTo(0, scrollPosition);
                location.reload();
            }, 1000);
        }
    });
}


function removeFromCart(cart_id) {
    // AJAX poziv za uklanjanje jela iz korpe
    $.ajax({
        type: "POST",
        url: "remove_from_cart.php",
        data: { cart_id: cart_id },
        success: function(response) {
            setTimeout(function() {
                // Vraćanje na prethodni položaj na stranici nakon osvežavanja
                var scrollPosition = localStorage.getItem('scrollPosition');
                window.scrollTo(0, scrollPosition);
                location.reload();
            }, 1000);
        
        }
    });
}

