document.addEventListener('DOMContentLoaded', function() {
    // URL of the page/component to be inserted
    const url = 'assets/components/slide/slide.html';
    const scriptUrl = 'assets/components/slide/slide.js';
    const cssUrl = 'assets/components/slide/slide.css';

    // Function to fetch and insert the component
    function loadComponent() {
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.text();
            })
            .then(data => {
                const slideElement = document.getElementById('slide');
                slideElement.innerHTML = data;
                loadCSS(cssUrl);
                loadScript(scriptUrl);
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    // Function to load an external script
    function loadScript(url) {
        const script = document.createElement('script');
        script.src = url;
        script.onload = function() {
            console.log('Script loaded successfully');
        };
        script.onerror = function() {
            console.error('Error loading script');
        };
        document.body.appendChild(script);
    }

    // Function to load an external CSS
    function loadCSS(url) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = url;
        link.onload = function() {
            console.log('CSS loaded successfully');
        };
        link.onerror = function() {
            console.error('Error loading CSS');
        };
        document.head.appendChild(link);
    }

    // Call the function to load the component
    loadComponent();
});


// assets/components/slide/slide.htm
