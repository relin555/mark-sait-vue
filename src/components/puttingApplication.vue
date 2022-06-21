<template>
  <div class="put">
    <div class="put__inner">
      <div class="application-btn" :class="{ 'application-btn__closed' : isOpen }" @click="isOpen = !isOpen">
        <p class="application-btn__title" @click="openMenuWidth">оставить <br/> заявку</p>
      </div>
      <form class="put-form" :class="{'put-form__open-menu' : isOpen}" :style="{ left: widthleftMenu }" action="">
        <div class="put-form__closet" @click="isOpen = false" >x</div>
        <input placeholder="введите имя" class="put-form__form-name input-style" type="text">
        <input placeholder="введите email" class="put-form__form-email input-style" type="email" name="" id="">
        <input placeholder="введите телефон" class="put-form__form-phone input-style" type="tel" name="" id="">
        <input class="put-form__form-btn" type="button" value="отправить">
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PuttingApplication',
  data() {
    return {
      name: '',
      email: '',
      phone: '',
      isOpen: false,
      widthBody: null,
      putFormWidth: null,
      widthleftMenu: null
    }
  },
  
  watch: {
    isOpen(newOpen , oldClosed) {
      if(newOpen) {
        this.widthleftMenu = ((this.widthBody - this.putFormWidth) / 2) + 'px'
      }
      if(!newOpen) {
        this.widthleftMenu = 101 + '%'
      }
    },
  },
  mounted() {
    let getBody = document.querySelector('body')
    let getForm = document.querySelector('.put-form')
    this.widthBody = getBody.clientWidth
    this.putFormWidth = getForm.clientWidth
  }
}
</script>

<style lang="scss" scoped>
.input-style {
  width: 40%;
  padding: 20px;
  border: 2px solid #EE4248;
  border-radius: 10px;
  outline: none;
}
.application-btn {
  position: fixed;
  top: 20%;
  right: 0;
  border: 1px solid #EE4248;
  width: 150px;
  padding: 10px;
  text-align: left;
  border-radius: 25px;
  background: rgba(238, 66, 72, 1);
  z-index: 10;
  transform: translateX(30%);
  transition: .2s;
  animation: opacityBtn 2s infinite;
  cursor: pointer;
  &__closed {
  transform: translateX(100vw);
  transition: .2s;
  }
  &__title {
    color: #FFFFFF;
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
  border: 1px solid #EE4248;
  padding: 30px;
  border-radius: 20px;
  background: rgba(238, 66, 72, 1);
  left: 100%;
  transition: .4s;
  &__closet {
    position: absolute;
    right: 10px;
    top: 10px;
    border: 1px solid #FFFFFF;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    color: #FFFFFF;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }
  input {
    width: 250px;
    margin-bottom: 20px;
  }
  input:last-child {
    width: 100px;
    padding: 15px;
    margin-bottom: 0;
    outline: none;
    border-radius: 10px;
    border: none;
    background: #FFFFFF;
    cursor: pointer;
  }
  &__open-menu {
    transition: .4s;
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
    opacity: .3;
  }
  50% {
    opacity: 1;
  }
  100% {
    opacity: .3;
  }
}
</style>