<template>
	<section class="cart-modal">
        <div class="cart-modal__wrapper">
            <div class="cart-modal__header">
                <div class="cart-modal__title">
                    <svg>
                        <use xlink:href="#cart"></use>
                    </svg>
                    <h4>Кор<span>Z</span>ина</h4>
                </div>
                <button type="button" class="cart-modal__close">
                    <span></span>
                </button>
            </div>
            <hr>
            <template v-if="count === 0">
	            <table class="cart-modal__table">
	                    <tr class="cart-item">
	                        <td class="cart-item__image">
	                            <img src="https://static.thenounproject.com/png/2034632-200.png" alt="product image" width="50px">
	                        </td>
	                        <td class="cart-item__name">
	                            <h4>Product name Lorem ipsum dolor sit amet.</h4>
	                        </td>
	                        <td class="cart-item__price">
	                            <span>199.00</span>грн.
	                        </td>
	                        <td class="cart-item__quantity">
	                            <form action="#">
	                                <input type="number" id="points" name="quantity" step="1" placeholder="1">
	                            </form>
	                        </td>
	                        <td class="cart-item__total">
	                            <span>199.00</span>грн.
	                        </td>
	                        <td class="cart-item__delete">
	                            <button type="btn">Видалити</button>
	                        </td>
	                    </tr>
	                    <tr class="cart-item">
	                        <td class="cart-item__image">
	                            <img src="https://static.thenounproject.com/png/2034632-200.png" alt="product image" width="50px">
	                        </td>
	                        <td class="cart-item__name">
	                            <h4>Product name Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quidem perspiciatis eum eligendi ea architecto.</h4>
	                        </td>
	                        <td class="cart-item__price">
	                            <span>199.00</span>грн.
	                        </td>
	                        <td class="cart-item__quantity">
	                            <form action="#">
	                                <input type="number" id="points" name="quantity" step="1" placeholder="1">
	                            </form>
	                        </td>
	                        <td class="cart-item__total">
	                            <span>199.00</span>грн.
	                        </td>
	                        <td class="cart-item__delete">
	                            <button type="btn">Видалити</button>
	                        </td>
	                    </tr>
	            </table>
	            <hr>
	            <div class="cart-modal__summ">
	                    <h3>До сплати:</h3>
	                    <b><span>309</span>грн.</b>
	            </div>
	            <div class="cart-modal__buttons">
	                    <button class="btn" type="button">Закрити</button>
	                    <button class="btn" type="button"
	                    	v-on:click="count++"
	                    >Оформити</button>
	            </div>
	        </template>
	        <template v-if="count === 1">
	            <div class="checkout">
	                <div class="checkout__steps">
	                    <div class="step">
	                        <span class="step__image">1</span>
	                        <p>Вашi даннi</p>
	                    </div>
	                    <div class="step">
	                        <span class="step__image ">2</span>
	                        <p>Cпосiб <br>оплати</p>
	                    </div>
	                    <div class="step">
	                        <span class="step__image ">3</span>
	                        <p>Пiдтвердження</p>
	                    </div>
	                </div>
	                <div class="checkout__form">
	                    <h2>Заповнiть анкету</h2>
	                    <form action="#">
	                        <div class="checkout__wrapper">
	                            <div class="checkout__input">
	                                <label for="checkout-name">Iм'я</label>
	                                <input type="text" id="checkout-name" name="checkout-name" required>
	                            </div>
	                            <div class="checkout__input">
	                                <label for="checkout-surname">Фамiлiя</label>
	                                <input type="text" id="checkout-surname" name="checkout-surname" required>
	                            </div>
	                            <div class="checkout__input">
	                                <label for="checkout-phone">Телефон</label>
	                                <input type="phone" id="checkout-phone" name="checkout-phone" required>
	                            </div>
	                            <div class="checkout__input">
	                                <label for="checkout-email">Email</label>
	                                <input type="email" id="checkout-email" name="checkout-email" required>
	                            </div>
	                            <div class="checkout__input">
	                                <p>або</p>
	                                <div class="login__link">
	                                    <a href="#">Вхiд</a>
	                                </div>
	                            </div>
	                            <div class="checkout__input">
	                                <button class="btn checkout__btn" type="submit"
	                                	v-on:click="count++"
	                                >Далi</button>
	                            </div>

	                        </div>
	                    </form>
	                </div>
	            </div>
	        </template>
	        <template v-if="count === 2">
	            <div class="checkout">
	                <div class="checkout__steps">
	                    <div class="step completed">
	                        <span class="step__image">
	                            <svg width="10px">
	                                <use xlink:href="#tick"></use>
	                            </svg>
	                        </span>
	                        <p>Вашi даннi</p>
	                    </div>
	                    <div class="step active">
	                        <span class="step__image ">2</span>
	                        <p>Cпосiб <br>оплати</p>
	                    </div>
	                    <div class="step">
	                        <span class="step__image ">3</span>
	                        <p>Пiдтвердження</p>
	                    </div>
	                </div>
	                <div class="checkout__form">
	                    <h2>Виберiть спосiб оплати</h2>
	                    <form action="#">
	                        <div class="checkout__wrapper">
	                            
	                                <input type="radio" id="cash" name="payment">
	                                <label for="cash">Готiвкою при отриманнi</label>
	                                
	                            
	                            
	                                <input type="radio" id="card" name="payment">
	                                <label for="card">Сплатити картою</label>
	                                
	                            
	                            <div class="checkout__input">
	                                <button class="btn checkout__btn" type="submit">Далi</button>
	                            </div>

	                        </div>
	                    </form>
	                </div>
	            </div>
	        </template>
        </div>
    </section>
</template>

<script>
	export default{
		data: function (){
			return {
				count: 0
			}
		}
	}
</script>