

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('scrollButton').addEventListener('click', function() {
    var middleElement = document.getElementById('middleElement');
    if (middleElement) {
      middleElement.scrollIntoView({ behavior: 'smooth' });
    }
   
  });
  
  
});



 
