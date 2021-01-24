import delegate from "delegate";
import Preloader from "./preloader";

const borderDangerClass = "border-danger";
const invalidFeedbackClass = "invalid-feedback";

delegate(document.body, "form[data-form-type=ajax] button", "click", e => {
  const form = event.target.closest('form');
  const formData = new FormData(form);
  let preloader = new Preloader(form);
  axios
    .post("api/feedback-form", formData)
    .then(response => {
      insertSuccessMessage(form, response.data);
      setWarnings(form, []); //Просто очищаем форму
    })
    .catch(error => {
      if (
        error.response &&
        error.response.status &&
        error.response.status === 422
      ) {
        setWarnings(form, error.response.data.errors);
      } else {
        throw error;
      }
    })
    .finally(() => {
      preloader.remove(form);
      preloader = null;
    });
})

function insertSuccessMessage(form, message) {
  const div = document.createElement("div");
  div.className = "feed-back-form__success-message";
  div.innerHTML = message;
  form.after(div);
}

/**
 * Показываем/убираем предупреждения
 *
 * @param Object form
 * @param Array errors
 */
function setWarnings(form, errors) {
  const labels = form.querySelectorAll("[name]");
  [...labels].map(label => {
    if (!!errors[label.name]) {
      const text = errors[label.name];
      label.classList.add(borderDangerClass);
      let messageBox = label.nextElementSibling;
      if (messageBox && messageBox.classList.contains(invalidFeedbackClass)) {
        messageBox.innerHTML(text);
      } else {
        const div = document.createElement("div");
        div.className = invalidFeedbackClass;
        div.innerHTML = text;
        label.after(div);
        div.style.display = "block";
      }
    } else {
      label.classList.remove("border-danger");
      let messageBox = label.nextElementSibling;
      if (messageBox && messageBox.classList.contains(invalidFeedbackClass)) {
        messageBox.remove();
      }
    }
  });
}
