function moveToNext(current, nextFieldId) {
    if (current.value.length === 1) {
      let nextField = document.getElementById(nextFieldId);
      if (nextField) {
        nextField.focus();
      }
    }
  }
  
  function combineOTP() {
    let otp1 = document.getElementById('otp1').value;
    let otp2 = document.getElementById('otp2').value;
    let otp3 = document.getElementById('otp3').value;
    let otp4 = document.getElementById('otp4').value;
  
    let combinedOTP = otp1 + otp2 + otp3 + otp4;
    document.getElementById('result').value = `${combinedOTP}`;
  }
  