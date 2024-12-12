function getYear() {
    try {
        // Get the current date
        var currentDate = new Date();

        // Extract the current year from the date
        var currentYear = currentDate.getFullYear();

        // Find the HTML element with ID "displayYear"
        var yearElement = document.querySelector("#displayYear");

        // Check if the element exists before trying to modify it
        if (yearElement) {
            // Set the innerHTML of the element to the current year
            yearElement.innerText = currentYear;  // innerText is the correct property
        } else {
            // Log an error and provide more detailed feedback if the element is not found
            console.error("Element with ID 'displayYear' not found. Ensure that an element with this ID exists in your HTML.");
        }
    } catch (error) {
        // Handle any unexpected errors
        console.error("An error occurred while setting the year:", error);
    }
}

// Call the function to execute it
getYear();



// owl carousel 

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})


  
