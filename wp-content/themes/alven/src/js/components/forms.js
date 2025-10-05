import { forEach } from '@stereorepo/sac';

const forms = () => {
    const fields = document.querySelectorAll('.js-field');

    if (!fields.length) return;

    forEach(fields, field => {
        if (field.querySelector('.form-elt').value) field.classList.add('off');

        field.addEventListener(
            'focusin',
            () => {
                field.classList.add('off');
            },
            false
        );

        field.addEventListener(
            'focusout',
            () => {
                if (!field.querySelector('.form-elt').value) field.classList.remove('off');
            },
            false
        );
    });
};

export default forms;
