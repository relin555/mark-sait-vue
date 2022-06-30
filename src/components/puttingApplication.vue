<template>
  <div class="put">
    <div class="put__inner">
      <div
        class="application-btn"
        :class="{ 'application-btn__closed': isOpen }"
        @click="isOpen = !isOpen"
      >
        <p class="application-btn__title" @click="openMenuWidth">
          оставить <br />
          заявку
        </p>
      </div>
      <form
        class="put-form"
        :class="{ 'put-form__open-menu': isOpen }"
        :style="{ left: widthleftMenu }"
        @submit.prevent="checkForm"
      >
        <div class="put-form__closet" @click="isOpen = false">x</div>
        <input
          name="name"
          placeholder="введите имя"
          v-model="form.name"
          class="put-form__form-name input-style"
          type="text"
        />
        <input
          name="email"
          placeholder="введите email"
          v-model="form.email"
          class="put-form__form-email input-style"
          type="email"
          id=""
        />
        <input
          placeholder="введите телефон"
          v-model="form.phone"
          class="put-form__form-phone input-style"
          type="tel"
          name="phone"
          id=""
        />
        <input
          name=""
          :disabled="isDisabled"
          class="put-form__form-btn"
          type="submit"
          value="отправить"
        />

        <p class="put-form__valid">заполните все три поля !!!</p>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "PuttingApplication",
  data() {
    return {
      name: "",
      email: "",
      phone: "",
      isOpen: false,
      widthBody: null,
      putFormWidth: null,
      widthleftMenu: null,
      form: {
        name: null,
        email: null,
        phone: null,
      },
    };
  },
  methods: {
    async checkForm() {
        try {
        const response = await fetch("sendMail.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(this.form),
        });
        console.log("res:", response);
        const answer = await response.json();
        console.log(answer);
      } catch(err) {
        // console.error("Ошибка:", err);
      }
      this.form = {
        name: null,
        email: null,
        phone: null,
      };
      this.isOpen = false
    },
  },
  computed: {
    isDisabled() {
      if (this.form.name === "" ||  this.form.name === null) {
        return true;
      } else if (this.form.email === "" || this.form.email === null) {
        return true;
      } else if (this.form.phone === "" || this.form.phone === null || this.form.phone.length < 11) {
        return true;
      }
    },
  },
  watch: {
    isOpen(newOpen, oldClosed) {
      if (newOpen) {
        this.widthleftMenu = (this.widthBody - this.putFormWidth) / 2 + "px";
      }
      if (!newOpen) {
        this.widthleftMenu = 101 + "%";
      }
    },
  },
  mounted() {
    let getBody = document.querySelector("body");
    let getForm = document.querySelector(".put-form");
    this.widthBody = getBody.clientWidth;
    this.putFormWidth = getForm.clientWidth;
  },
};
</script>

<style lang="scss" scoped>
.input-style {
  width: 40%;
  padding: 20px;
  border: 2px solid #ee4248;
  border-radius: 10px;
  outline: none;
}
.application-btn {
  position: fixed;
  top: 20%;
  right: 0;
  border: 1px solid #ee4248;
  width: 150px;
  padding: 10px;
  text-align: left;
  border-radius: 25px;
  background: rgba(238, 66, 72, 1);
  z-index: 10;
  transform: translateX(30%);
  transition: 0.2s;
  animation: opacityBtn 2s infinite;
  cursor: pointer;
  &__closed {
    transform: translateX(100vw);
    transition: 0.2s;
  }
  &__title {
    color: #ffffff;
    font-size: 18px;
    text-transform: uppercase;
  }
}
.put-form {
  position: fixed;
  top: 20%;
  display: flex;
  flex-direction: column;
  z-index: 10;
  border: 1px solid #ee4248;
  padding: 30px;
  border-radius: 20px;
  background: rgba(238, 66, 72, 1);
  left: 100%;
  transition: 0.4s;
  &__closet {
    position: absolute;
    right: 10px;
    top: 10px;
    border: 1px solid #ffffff;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }
  input {
    width: 250px;
    margin-bottom: 20px;
  }
  &__form-btn {
    width: 250px;
    background: rgba(145, 250, 154, 1);
    margin-bottom: 20px;
    padding: 5px;
    border-radius: 10px;
    outline: none;
    border: 2px solid rgba(145, 250, 154, 1);
    transition: .3s;
  }
  &__form-btn:disabled {
    background: rgba(245, 37, 76, 1);
    color: #ffffff;
    cursor: not-allowed;
    transition: .3s;
  }
  &__open-menu {
    transition: 0.4s;
  }
  &__valid {
    text-align: center;
    color: #ffffff;
  }
}
.put {
  &__inner {
    display: flex;
    justify-content: center;
  }
}

@keyframes opacityBtn {
  0% {
    opacity: 0.3;
  }
  50% {
    opacity: 1;
  }
  100% {
    opacity: 0.3;
  }
}
</style>
