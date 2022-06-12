<template>
  <div class="app">
    <header class="header" :class="{ header__active: isActive }">
      <div class="header__inner conteiner">
        <div class="header__logo-wrapper">
          <img class="header__logo" src="./assets/images/logo.png" alt="" />
        </div>
        <nav
          class="header__link-items"
          :class="{ 'header__active-menu': isActive }"
        >
          <router-link
            class="header__link"
            v-for="item in pageSait"
            :key="item.to"
            :to="item.to"
          >
            {{ item.name }}
          </router-link>
        </nav>
        <div
          class="header__feedback"
          :class="{ 'header__active-menu': isActive }"
        >
          <ul class="header__feedback-items">
            <li class="header__feedback-item">
              <router-link to="/" class="header__feedback-item-home">
                <img src="./assets/images/iconHome.svg" alt="iconhome" />
              </router-link>
            </li>
            <li class="header__feedback-item">
              <a
                href="mailto:nowhere@mozilla.org"
                class="header__feedback-item-mail"
              >
                <img src="./assets/images/mail.svg" alt="iconmail" />
              </a>
            </li>
            <li class="header__feedback-item">
              <a href="tel:+79776024613" class="header__feedback-item-phone">
                <img src="./assets/images/shuffle.svg" alt="" />
              </a>
            </li>
          </ul>
        </div>
        <div class="header__burger">
          <div class="header__burger-wrapper" @click="addMenu($event)" ></div>
          <div class="header__burger-item"></div>
        </div>
      </div>
    </header>

    <router-view />

    <footer class="footer">
      <div class="footer__inner conteiner">
        <div class="footer__left-column">
          <img class="footer__logo" src="./assets/images/logo.png" alt="" />
          <div class="footer__left-column-info">
            <h2 class="footer__left-column-capital-city">
              Москва, Российская Федерация
            </h2>
            <p class="footer__left-column-adress">
              Ruko Jalur Sutera 29A No. 53 <br />Alam Sutera Serpong, Tangerang
              15323
            </p>
          </div>
        </div>
        <div class="footer__right-column">
          <h2 class="footer__right-column-title">Контакт</h2>
          <a href="tel:+79776024613">Phone : +62.21.5314.1135</a>
          <a href="mailto:nowhere@mozilla.org">community@dwidasa.com</a>
        </div>
      </div>
      <div class="footer__copyright-wrapper">
        <p class="footer__copyright">
          Copyright © 2022 - Moscow Russia
        </p>
      </div>
    </footer>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "App",
  data() {
    return {
      isActive: false,
    };
  },
  methods: {
    addMenu() {
      this.isActive = !this.isActive;
    }
  },
  computed: {
    ...mapGetters(["pageSait"]),
  },
  mounted() {
    
  },
};
</script>

<style lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");
*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
  color: #30444e;
}
a {
  text-decoration: none;
}
ul {
  list-style-type: none;
}
body {
  min-width: 320px;
  font-weight: 400;
  font-size: 18px;
  line-height: 21px;
}
button {
  outline: none;
  border: none;
  cursor: pointer;
}
.conteiner {
  padding: 0 20px;
}
.header {
  transition: 0.3s;
  box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
  background: #ffffff;
  position: fixed;
  width: 100vw;
  top: -1px;
  z-index: 10;
  &__active {
    height: 100vh;
    background: #ffffff;
    transition: 0.3s;
  }
  &__inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    padding: 0 20px;
  }
  &__link-items {
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 30vh;
    left: 40vw;
    transform: translateY(-100vh);
    transition: 0.3s;
  }
  &__link {
    padding-bottom: 20px;
  }
  &__feedback {
    position: absolute;
    bottom: -80vh;
    left: 30vw;
    transform: translateY(-100vh);
    transition: 0.3s;
  }
  &__active-menu {
    transform: translateY(0);
    transition: 0.3s;
  }
  &__feedback-items {
    display: flex;
  }
  &__feedback-item {
    padding-right: 40px;
  }
  &__feedback-item:last-child {
    padding-right: 0px;
  }
  &__burger-item {
    width: 25px;
    height: 2px;
    background: #30444e;
  }
  &__burger {
    position: relative;
  }
  &__burger-wrapper {
    height: 30px;
    width: 30px;
    position: absolute;
    top: -13px;
  }
  &__burger-item::after {
    content: "";
    position: absolute;
    top: 10px;
    width: 25px;
    height: 2px;
    background: #30444e;
  }
  &__burger-item::before {
    content: "";
    position: absolute;
    top: -10px;
    width: 25px;
    height: 2px;
    background: #30444e;
  }
}
.footer {
  margin-top: 50px;
  &__inner {
    display: flex;
    flex-direction: column;
  }
  &__left-column-info {
    padding: 20px 0;
  }
  &__left-column-capital-city {
    font-weight: 500;
    font-size: 18px;
    line-height: 21px;
    margin-bottom: 8px;
  }
  &__left-column-adress {
    font-size: 16px;
    line-height: 149.19%;
  }
  &__right-column {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }
  &__right-column > a {
    font-size: 16px;
    line-height: 149.19%;
  }
  &__right-column-title {
    font-weight: 500;
    font-size: 18px;
    line-height: 28px;
  }
  &__copyright-wrapper {
    padding: 22px 0;
    background: #ee4248;
  }
  &__copyright {
    font-size: 16px;
    text-align: center;
    color: #ffffff;
  }
}
@media (min-width: 821px) {
  .conteiner {
    margin: 0 auto;
    padding: 0 30px;
    max-width: 1176px;
  }
  .header {
    &__burger {
      display: none;
    }
    &__link-items {
      position: static;
      transform: translateY(0);
      display: flex;
      flex-direction: inherit;
    }
    &__link {
      padding-right: 15px;
      padding-bottom: 0;
      transition: .2s;
    }
    &__link:hover {
    color: #ee4248;
    transition: .2s;
    }
    &__feedback {
      position: static;
      transform: translateY(0);
    }
  }
  .footer {
    &__inner {
      display: flex;
      flex-direction: inherit;
    }
    &__left-column {
      margin-right: 47px;
    }
    &__right-column {
      justify-content: flex-end;
    }
  }
}
@media (min-width: 1440px) {
  .header {
    &__link {
      padding-right: 50px;
    }
    &__link:last-child {
      padding-right: 0px;
    }
  }
}
</style>
