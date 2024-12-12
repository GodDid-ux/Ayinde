//for shipping form

document.addEventListener('DOMContentLoaded', function() {
    const shippingForm = document.getElementById('shippingForm');
    if (shippingForm) {
        shippingForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Clear previous error messages
            document.querySelectorAll('.error').forEach(errorSpan => errorSpan.innerText = '');

            let isValid = true;
            const formData = new FormData(this);

            // Example validation checks
            const fields = ['name', 'address', 'city', 'state', 'postalCode', 'phone'];
            fields.forEach(field => {
                const value = formData.get(field).trim();
                if (!value) {
                    document.getElementById(`${field}Error`).innerText = `${field.charAt(0).toUpperCase() + field.slice(1).replace(/([A-Z])/g, ' $1')} is required`;
                    isValid = false;
                }
            });

            if (!isValid) {
                return; // Prevent form submission if validation fails
            }

            // AJAX request
            $.ajax({
                url: 'submit_shipping.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    try {
                        const responseData = JSON.parse(response);
                        if (responseData.success) {
                            // Redirect if success message is received
                            // window.location.href = 'payment.html'; 
                        } else {
                            // Handle server-side validation errors
                            alert(responseData.message); // Show server response message
                        }
                    } catch (e) {
                        console.error('Invalid JSON response:', e);
                        alert('An error occurred while processing your request. Please try again later.');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX error:', textStatus, errorThrown);
                    alert('An error occurred. Please try again later.');
                }
            });
        });
    } else {
        console.error('Element with ID "shippingForm" not found.');
    }
});


// For sign up php
document.getElementById('signupForm').onsubmit = function(event) {
    event.preventDefault(); // Prevent the default form submission

    if (!validateSignUpForm()) {
        return; // If form validation fails, do not proceed
    }

    var form = event.target;
    var formData = new FormData(form);

    fetch('signup.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Sign up successful'); // Alert a generic success message
            window.location.href = 'index.php'; // Redirect to index.php
        } else {
            alert('Sign up failed: ' + data.message); // Show error message
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
};

// Add your sign-up form validation function if needed
function validateSignUpForm() {
    // Implement validation logic here
    // Return true if valid, false otherwise
    return true; // Placeholder, update with actual validation
}


// signin form script
function validateSignInForm() {
    const username = document.getElementById('signinUsername').value;
    const password = document.getElementById('signinPassword').value;

    // Make an AJAX call to signin.php
    fetch('signin.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `signinUsername=${encodeURIComponent(username)}&signinPassword=${encodeURIComponent(password)}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Show success message (optional)
            alert(data.message);

            // Redirect to the desired page after successful sign-in
            const redirectUrl = data.redirectUrl || 'index.php';
            window.location.href = redirectUrl;
        } else {
            // Show error message if sign-in fails
            alert('Sign in failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

    return false; // Prevent the default form submission
}


//  Cart items script
// Function to generate a unique Product ID
function generateProductID() {
    const timestamp = Date.now(); // Get the current timestamp
    const randomNumber = Math.floor(Math.random() * 1000); // Generate a random number between 0 and 999
    return `PID-${timestamp}-${randomNumber}`; // Combine the timestamp and random number for uniqueness
}

// Function to generate a unique Order ID
function generateOrderId() {
    const timestamp = Date.now(); // Current timestamp in milliseconds
    const randomNum = Math.floor(Math.random() * 10000); // Random number between 0 and 9999
    return `ORD-${timestamp}-${randomNum}`;
}

// Function to submit cart data to the server
function submitCart() {
    const cartItems = document.querySelectorAll('.cart-content .detail-box'); // Adjust selector if needed
    const cartData = [];

    // If no items in the cart, alert the user and exit
    if (cartItems.length === 0) {
        alert('No items found in the cart. Please add items before proceeding.');
        return; // Stop execution if no cart items are found
    }

    const orderId = generateOrderId(); // Generate a unique order ID

    // Collect data for each item in the cart
    cartItems.forEach((item) => {
        const productTitle = item.querySelector('.cart-product-title')?.innerText.trim();
        const productPrice = parseFloat(item.querySelector('.cart-price')?.innerText.replace(/[^0-9.-]+/g, ""));
        const productQuantity = parseInt(item.querySelector('.cart-quantity')?.value, 10);
        const productImgElement = item.closest('.cart-content')?.querySelector('.cart-img');
        const productImg = productImgElement ? productImgElement.src : '';

        // Validate cart item data
        if (!productTitle || isNaN(productPrice) || isNaN(productQuantity) || productQuantity <= 0) {
            console.error('Error: Missing or invalid product data.');
            alert('Error in cart item data. Please check your cart and try again.');
            return; // Stop execution if there is an issue with data
        }

        const totalPrice = productPrice * productQuantity; // Calculate total price for the item

        const productData = {
            productID: generateProductID(), // Add unique product ID
            title: productTitle,
            price: productPrice,
            quantity: productQuantity,
            img: productImg,
            total: totalPrice,
            orderid: orderId
        };

        cartData.push(productData); // Add the item data to the cart array
    });

    // Debugging: check the cart data
    console.log('Collected Cart Data:', cartData);

    const dataToSend = { cart: cartData };

    // Send the data using AJAX
    fetch('save_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dataToSend)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Server responded with a status: ${response.status}`);
            }
            return response.json(); // Parse JSON response
        })
        .then(data => {
            if (data.success) {
                alert("Your order has been placed! Redirecting to shipping details...");
                window.location.href = data.redirect; // Redirect to shipping.html
            } else {
                alert(`There was an issue saving your cart. Error: ${data.message}`);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert(`An error occurred while saving your cart. ${error.message}`);
        });
}


  
//   For comment submission
$(document).ready(function() {
    $('#commentForm').on('submit', function(event) {
        event.preventDefault();

        // Capture form data
        var name = $('#name').val();
        var email = $('#email').val();
        var comment = $('#comment').val();

        // AJAX request to submit form data
        $.ajax({
            url: 'submit_comment.php',
            method: 'POST',
            data: {
                name: name,
                email: email,
                comment: comment
            },
            success: function(response) {
                try {
                    // Parse the JSON response
                    var data = JSON.parse(response);

                    // Check if there's an error in the response
                    if (data.error) {
                        console.log("Error:", data.error);
                        alert("Error: " + data.error);
                        return;
                    }

                    // Display success message
                    alert(data.message);

                    // Create a new carousel item
                    var newCarouselItem = `
                    <div class="carousel-item">
                        <div class="box">
                            <div class="client_info">
                                <div class="client_name">
                                    <h5>${data.name}</h5>
                                    <h6>${data.email}</h6>
                                </div>
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <p>${data.comment}</p>
                        </div>
                    </div>`;

                    // Append the new carousel item
                    $('.carousel-inner').append(newCarouselItem);

                    // Reset the form
                    $('#commentForm')[0].reset();

                    // Activate the new comment slide
                    $('.carousel-inner .carousel-item').removeClass('active');
                    $('.carousel-inner .carousel-item:last').addClass('active');

                    // Redirect to testimonial.html
                    window.location.href = 'testimonial.html';
                } catch (e) {
                    console.log("Error parsing JSON:", e);
                    console.log("Response received:", response);
                }
            },
            error: function(error) {
                console.log("Error:", error);
            }
        });
    });
});

// for search botton
  document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const query = document.querySelector('input[type="search"]').value.toLowerCase();
    const items = document.querySelectorAll('#content .item');

    items.forEach(item => {
      const text = item.textContent.toLowerCase();
      item.style.display = text.includes(query) ? 'block' : 'none';
    });
  });

//   for tracking orders





