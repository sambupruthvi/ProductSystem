//--------------------------------------------------------//
//card.html validation and manipulation
var cardNumber = document.getElementById("cardNumberBox");
var expiryDate = document.getElementById("expiryDateBox");
var holderName = document.getElementById("holderNameBox");
var cvvValue = document.getElementById("CvvBox");
var proceed = document.getElementById("proceed");
var cancel = document.getElementById("cancel");
var forms = document.forms[0].elements;

function validateCardNumber()
{
  
    if(cardNumber.value.length ==16 ) //||cardNumber.value.length ==20
        {
            var card = cardNumber.value;
            var Regex = /(\d{1,4})/g;
            var newCard = card.split(Regex);
            cardNumber.style.borderColor="";
            cardNumber.value = newCard.join(" ");
        }
    if(cardNumber.value.length == 20)
        {
            cardNumber.focus();
            cardNumber.style.borderColor="";
        }
    if(cardNumber.value.length =="" || cardNumber.value.length<16 )
        {
            cardNumber.focus();
            cardNumber.style.borderColor="red";
        }
    if(cardNumber.value.length>16 && cardNumber.value.length <20)
        {
             cardNumber.focus();
            cardNumber.style.borderColor="red";
        }
}
function validateExpiry()
{
    if(expiryDate.value.length == 7)
        {
            var expiry = expiryDate.value;
            var Regex = /\b\d{1,2}\W[1]\d{1,3}\b/g;
            if(expiry.match(Regex))
                {
                    expiryDate.style.borderColor="";
                }
            else
                {
                    expiryDate.focus();
                    expiryDate.style.borderColor="red";
                }
            
        }
    else{
        expiryDate.focus();
        expiryDate.style.borderColor="red";
    }
}

function validateHolder()
{
    if(holderName.value.length == "")
        {
            holderName.focus();
            holderName.style.borderColor="red";
        }
    else
        {
            holderName.style.borderColor="";
        }
}
function validateCvv()
{
    if(cvvValue.value =="")
        {
            cvvValue.focus();
            cvvValue.style.borderColor="red";
        }
    if(cvvValue.value.length == 3)
        {
            var cvv = cvvValue.value;
            var Regex = /\b\d{3}\b/g;
            if(cvv.match(Regex))
                {
                    cvvValue.style.borderColor="";
                }
            else
                {
                    cvvValue.focus();
                    cvvValue.style.borderColor="red";
                }
        }
    if(cvvValue.value.length <3 ||cvvValue.value.length >3)
        {
             cvvValue.focus();
            cvvValue.style.borderColor="red";
        }
   
}
function cancelFunction()
{
    cardNumber.value="";
    expiryDate.value="";
    cvvValue.value="";
    holderName.value="";
}

// on click validation
for(var i=0 ; i<forms.length; i++)
    {
        if(forms[i].type =="text")
            {
                forms[i].onblur = checkIfEmpty;
            }
        forms[forms.length-2].disabled = true;
    }


function checkIfEmpty()
{
    var emptyStatus = false;
    for(var i=0; i<forms.length; i++)
        {
            if(forms[i].type =="text" && forms[i].value == 0)
                {
                    emptyStatus = true;
                    break;
                }
        }
    forms[forms.length-2].disabled = emptyStatus;
}



cardNumber.addEventListener('focusout',validateCardNumber,false);
expiryDate.addEventListener('focusout',validateExpiry,false);
holderName.addEventListener('focusout',validateHolder,false);
cvvValue.addEventListener('focusout',validateCvv,false);

