

const elements = document.querySelectorAll('a[desc]');
const prmodal = document.querySelector('.prmodal')
const closemodal = document.querySelector('.closeprmodal')

closemodal.addEventListener('click', function(e){
    

    prmodal.style.translate = '0px 288px';
    prmodal.style.transition = 'all .3s ease-in-out';
    prmodal.style.opacity = '0';
    setTimeout(() => {
        prmodal.classList.add('hide')
    }, 500);
    
    
})

elements.forEach(function(element){
    element.addEventListener('click', function(event){
        event.preventDefault()
        var desc = this.getAttribute('desc')
        console.log(desc);
        prmodal.classList.remove('hide')
        prmodal.style.translate = '0px 288px';
        prmodal.style.transition = 'all .3s ease-in-out';
        prmodal.style.opacity = '0';
        setTimeout(() => {
            prmodal.style.translate = '0px 0px';
            prmodal.style.opacity = '1';
        }, 1);
    })
})