    // Show/hide the "Specify the Item" input based on the selected donation type
    function toggleOtherItem() {
        const donationType = document.getElementById('donation-type');
        const otherItemDetails = document.getElementById('other-item-details');
  
        if (donationType.value === 'other-item') {
          otherItemDetails.style.display = 'block';
        } else {
          otherItemDetails.style.display = 'none';
        }
      }
  
      // Toggle the card details section based on the selected payment method
      function toggleCardDetails(show) {
        const cardDetails = document.querySelectorAll('.card-details');
  
        for (let i = 0; i < cardDetails.length; i++) {
          if (show) {
            cardDetails[i].style.display = 'block';
          } else {
            cardDetails[i].style.display = 'none';
          }
        }
      }
  
      // Form validation
      function validateForm() {
        const paymentMethodOnline = document.querySelector('#payment-online');
        const cardNumber = document.querySelector('#card-number');
        const cardExpiry = document.querySelector('#card-expiry');
        const cardCvv = document.querySelector('#card-cvv');
        const amount = document.querySelector('#amount');
  
        if (paymentMethodOnline.checked) {
          if (cardNumber.value.trim() === '' || cardExpiry.value.trim() === '' || cardCvv.value.trim() === '') {
            alert('Please fill in all the card details.');
            return false;
          }
        }
  
        if (parseInt(amount.value) < 0) {
          alert('Please enter a valid amount.');
          return false;
        }
  
        return true;
      }