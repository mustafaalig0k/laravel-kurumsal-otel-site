document.addEventListener('DOMContentLoaded', function ()
{
    let btnRegister = document.querySelector("#btnRegister");
    let registerForm = document.querySelector("#registerForm");

    let registerFormInputs = document.querySelectorAll("#registerForm input");


    let validation = {
        rules   : {
            name                 : {
                required : true,
                minLength: 4,
                maxLength: 125,
            },
            email                : {
                required : true,
                minLength: 2,
                maxLength: 125,
                email    : true
            },
            password             : {
                required : true,
                minLength: 4,
                maxLength: 125,
            },
            password_confirmation: {
                required        : true,
                minLength       : 4,
                maxLength       : 125,
                compareElementId: "password"
            }
        },
        messages: {
            name                 : {
                required : "Kullanıcı adı alanını doldurmak zorunludur.",
                minLength: "Kullanıcı adı en az 4 karakterden oluşmalıdır.",
                maxLength: "Kullanıcı adı en fazla 125 karakterden oluşmalıdır.",
            },
            email                : {
                required : "Email alanı zorunludur.",
                minLength: "Email en az 2 karakterden oluşmalıdır.",
                maxLength: "Email en fazla 125 karakterden oluşmalıdır.",
                email    : "Geçerli bir email adresi giriniz."
            },
            password             : {
                required : "Parola alanı zorunludur.",
                minLength: "Parola en az 4 karakterden oluşmalıdır.",
                maxLength: "Parola en fazla 125 karakterden oluşmalıdır.",
            },
            password_confirmation: {
                required        : "Parola tekrarı alanı zorunludur.",
                minLength       : "Parola tekrarı en az 4 karakterden oluşmalıdır.",
                maxLength       : "Parola tekrarı en fazla 125 karakterden oluşmalıdır.",
                compareElementId: "Parola ve parola tekrarı uyuşmuyor."
            },
        }
    }

    let validationRules = validation.rules;
    let validationMessages = validation.messages;

    registerFormInputs.forEach(function (input) {
        input.addEventListener("blur", function (event) {
            let element = event.target;
            let parentElement = element.parentElement;
            let elementID = element.id;
            let nextElement = element.nextElementSibling;

            let feedbackList = parentElement.querySelectorAll(".invalid-feedback");
            feedbackList.forEach(element => element.remove());

            if (element.className.includes("is-invalid")) {
                element.classList.remove("is-invalid");
            }

            if (validationRules.hasOwnProperty(elementID)) {
                let elementValue = element.value.trim();

                for(let fieldKey in validationRules[elementID]) {
                    let fieldValue = validationRules[elementID][fieldKey];

                    if (fieldKey === "required" && fieldValue && elementValue.length < 1) {
                        element.classList.add("is-invalid");

                        let invalidElementInfo = document.createElement("div");
                        invalidElementInfo.className = "invalid-feedback";
                        invalidElementInfo.id = elementID + "-feedback-" + fieldKey;
                        invalidElementInfo.textContent = validationMessages[elementID].required

                        element.insertAdjacentElement("afterend", invalidElementInfo);
                    } else if (fieldKey === 'required' && fieldValue && elementValue.length >= 1) {
                        let invalidElementInfo = document.querySelector("#" + elementID + "-feedback-" + fieldKey);
                        if (invalidElementInfo) {
                            invalidElementInfo.remove();
                        }
                    }

                    if (fieldKey === "minLength" && fieldValue && elementValue.length < fieldValue) {
                        element.classList.add("is-invalid");

                        let invalidElementInfo = document.createElement("div");
                        invalidElementInfo.className = "invalid-feedback";
                        invalidElementInfo.id = elementID + "-feedback-" + fieldKey;
                        invalidElementInfo.textContent = validationMessages[elementID].minLength

                        element.insertAdjacentElement("afterend", invalidElementInfo);
                    } else if (fieldKey === 'minLength' && fieldValue && elementValue.length >= fieldValue) {
                        let invalidElementInfo = document.querySelector("#" + elementID + "-feedback-" + fieldKey);
                        if (invalidElementInfo) {
                            invalidElementInfo.remove();
                        }
                    }

                    if (fieldKey === "maxLength" && fieldValue && elementValue.length > fieldValue) {
                        element.classList.add("is-invalid");

                        let invalidElementInfo = document.createElement("div");
                        invalidElementInfo.className = "invalid-feedback";
                        invalidElementInfo.id = elementID + "-feedback-" + fieldKey;
                        invalidElementInfo.textContent = validationMessages[elementID].maxLength

                        element.insertAdjacentElement("afterend", invalidElementInfo);
                    } else if (fieldKey === 'maxLength' && fieldValue && elementValue.length <= fieldValue) {
                        let invalidElementInfo = document.querySelector("#" + elementID + "-feedback-" + fieldKey);
                        if (invalidElementInfo) {
                            invalidElementInfo.remove();
                        }
                    }
                }

                if (validationRules[elementID].hasOwnProperty('email') &&
                    validationRules[elementID].email &&
                    !validateEmail(element.value.trim())) {
                    element.classList.add("is-invalid");

                    let invalidElementInfo = document.createElement("div");
                    invalidElementInfo.className = "invalid-feedback";
                    invalidElementInfo.id = elementID + "-feedback";
                    invalidElementInfo.textContent = validationMessages[elementID].email

                    element.insertAdjacentElement("afterend", invalidElementInfo);
                } else if (validationRules[elementID].hasOwnProperty('compareElementId') &&
                    validationRules[elementID].compareElementId) {

                    let passwordValue = document.querySelector('#' + validationRules[elementID].compareElementId).value;

                    if (!checkPasswordsMatch(passwordValue, element.value.trim())) {
                        element.classList.add("is-invalid");

                        let invalidElementInfo = document.createElement("div");
                        invalidElementInfo.className = "invalid-feedback";
                        invalidElementInfo.id = elementID + "-feedback-2";
                        invalidElementInfo.textContent = validationMessages[elementID].compareElementId

                        element.insertAdjacentElement("afterend", invalidElementInfo);
                    }
                }
            }
        });
    });

    btnRegister.addEventListener("click", function ()
    {
        ruleName:
            for (const rule in validationRules) {
                let element = document.querySelector('[name=' + rule + ']');
                if (element) {
                    let elementValue = element.value.trim();
                    for (const fieldKey in validationRules[rule]) {
                        let fieldValue = validationRules[rule][fieldKey];

                        if (
                            (fieldKey === 'required' && elementValue.length < 1) ||
                            (fieldKey === 'minLength' && elementValue.length < fieldValue) ||
                            (fieldKey === 'maxLength' && elementValue.length > fieldValue) ||
                            (fieldKey === 'email' && elementValue && !validateEmail(elementValue)) ||
                            (fieldKey === 'compareElementId' && elementValue && !checkPasswordsMatch(document.querySelector("#" + fieldValue).value ,elementValue))
                        ) {
                            Swal.fire({
                                title: "Uyarı!",
                                text: validationMessages[rule][fieldKey],
                                icon: "warning"
                            });
                            break ruleName;
                        } else {
                            registerForm.submit();
                        }
                    }
                }
            }
    });

    function validateEmail(email) {
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function checkPasswordsMatch(password, confirmPassword) {
        return password === confirmPassword;
    }
});
