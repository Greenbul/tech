<template>
    <a class="btn btn-dual-line btn-primary #000 waves-effect waves-light order-consultant modal-trigger " href="#order-consult">
        Заказать <br> консультацию
    </a>

    <div id="order-consult" class="modal">
        <form action="">
            <div class="modal-content">
                <h4>Заказать  консультацию</h4>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" name="first_name" type="text" class="validate" length="255" maxlength="255" required
                               v-on:keyup.enter="sendOrderConsult">
                        <label for="first_name">Ваше имя</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="phone" name="phone" type="number" class="validate" required length="255" maxlength="255"
                               v-on:keyup.enter="sendOrderConsult">
                        <label for="phone">Контактный номер телефона</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">
                    Закрыть
                </a>

                <a href="#!" class="modal-action green darken-1 white-text waves-effect waves-light btn-flat" @click="sendOrderConsult">
                    Заказать консультацию
                </a>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return {};
        },
        methods: {
            /**
             * Обработчик формы отправки сообщения.
             * Так как народ иногда по "enter" отправляет - добавляем и к текстовым полям нужную функцию.
             */
            sendOrderConsult(){
                // Будем обрабатывать событие формы onSubmit
                var
                        form       = $('#order-consult').find('form'),
                        first_name = form.find('input[name=first_name]').val().trim(),
                        phone      = form.find('input[name=phone]').val().trim();

                this.$http.post('/api/order-consult', {
                            first_name: first_name,
                            phone:      phone
                        }
                ).then(
                        // Если все хорошо
                        function (response) {
                            Materialize.toast(response.data.response, 4000, 'green white-text');
                            $('#order-consult').closeModal();

                            // Очистим поля, раз форма успешно отправлена.
                            form.find('input').val('');
                        },
                        // Если возникли ошибки
                        function (response) {
                            Materialize.toast(response.data.errors, 4000, 'red white-text');
                        }
                );
            }
        }
    }
</script>
