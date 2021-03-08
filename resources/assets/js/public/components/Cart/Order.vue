<template>
    <div class="purchase">
    <section class="purchase__form">
        <div class="purchase__title">
            <h4>Доставка</h4>
        </div>
        <form class="purchase__details" action="#">
            <fieldset>
                <legend>Особисті данні</legend>
                <div class="form-row">
                    <div class="form-cell">
                        <input class="form__input" name="first-name" id="first-name" type="text" required>
                        <label class="form__label" for="first-name">Iм'я</label>
                    </div>
                    <div class="form-cell">
                        <input name="last-name" id="last-name" type="text" required>
                        <label for="last-name">Прізвище</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-cell">
                        <input name="email" id="email" type="text" required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-cell">
                        <input name="phone" id="phone" type="text" required>
                        <label for="phone">Телефон</label>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Адреса</legend>
                <div class="form-row">
                    <input name="address" id="address" type="text" required>
                    <label for="address">Вулиця, будинок, квартира тощо</label>
                </div>
                <div class="form-row">
                    <div class="form-cell">
                        <input name="region" id="region" type="text" required>
                        <label for="region">Регіон</label>
                    </div>
                    <div class="form-cell">
                        <input name="city" id="city" type="text" required>
                        <label for="city">Місто</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-cell">
                        <input name="index" id="index" type="text" required>
                        <label for="index">Індекс</label>
                    </div>
                    <div class="form-cell">
                        <input name="country" id="country" type="text" required>
                        <label for="city">Країна</label>
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
    <section class="purchase__equiring">
        <div class="purchase__title">
            <h4>Оплата</h4>
        </div>
        <div class="credit-card">
            <div class="credit-card__front">
                <div class="credit-card__logo">
                    <img src="public/svg/mastercard.svg" alt="mastercard-logo" width="32px">
                    <img src="public/svg/visa.svg" alt="visa-logo" width="45px">
                </div>
                <div class="credit-card__number">
                    <input type="text" name="card-number" id="card-number">
                    <label for="card-number">Номер платіжної картки</label>
                </div>
                <div class="credit-card__text">
                    <label for="date">Діє до</label>
                </div>
                <div class="credit-card__date">
                    <div class="expiry-date">
                        <input type="text" id="date" name="date" placeholder="MM">
                        <span>/</span>
                        <input type="text" id="year" name="year" placeholder="PP">
                    </div>
                    <div class="cvv">
                        <input type="text" placeholder="cvv">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</template>
