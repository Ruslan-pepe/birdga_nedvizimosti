<template>
<div style="display: grid;height: 100%">
  <!--  <form>-->
  <form action="/test" method="get">
    <div class="contentOrderCreate">
      <div id="group-0" class="group-0">
        <p class="textOrder">Новое объявление</p>
        <button-create @data="btnData" :cls="0" :data="['Аренда','Продажа']"
                       :data-value="['rental', 'sale']" :data-name="['typeOrder']"
                       :type-label="'Тип сделки'"
        />
        <div v-if="dataRequest.typeOrder === 'sale'">
          <button-create-t2 @data="btnData"
                            :cls="1"
                            :data-value="['apartament', 'apartamentNew', 'room', 'house', 'cottage', 'townhouse', 'housePart', 'area', 'garage', 'Office', 'Building', 'RetailSpace', 'FreeUsePremises', 'Production', 'Warehouse', 'Business', 'CommercialLand']"
                            :data1="['Квартира', 'Квартира в новостройке', 'Комната или доля', 'Дом/Дача', 'Коттедж', 'Таунхаус', 'Часть дома', 'Участок', 'Гараж']"
                            :data2="['Офис', 'Здание', 'Торговая площадь', 'Помещение свободного назначения', 'Производство', 'Склад', 'Бизнес', 'Коммерческая земля']"
                            :data-value1="['apartament', 'apartamentNew', 'room', 'house', 'cottage', 'townhouse', 'housePart', 'area', 'garage']"
                            :data-value2="['Office', 'Building', 'RetailSpace', 'FreeUsePremises', 'Production', 'Warehouse', 'Business', 'CommercialLand']"
                            :type-label1="'Жилая недвижимость'"
                            :type-label2="'Коммерческая недвижимость'"
                            :data-name="['typeRoom']"/>
        </div>
        <div v-if="dataRequest.typeOrder === 'rental'">
          <button-create-t2 @data="btnData"
                            :cls="2"
                            :data-value="['apartament', 'room', 'house', 'cottage', 'townhouse', 'housePart', 'garage', 'Office', 'Coworking', 'Building', 'RetailSpace', 'FreeUsePremises', 'Warehouse', 'Production', 'CommercialLand']"
                            :data1="['Квартира', 'Комната', 'Дом/Дача', 'Коттедж', 'Таунхаус', 'Часть дома', 'Гараж']"
                            :data2="['Офис', 'Коворкинг','Здание', 'Торговая площадь', 'Помещение свободного назначения', 'Склад', 'Производство', 'Коммерческая земля']"
                            :data-value1="['apartament', 'room', 'house', 'cottage', 'townhouse', 'housePart', 'garage']"
                            :data-value2="['Office', 'Coworking', 'Building', 'RetailSpace', 'FreeUsePremises', 'Warehouse', 'Production', 'CommercialLand']"
                            :type-label1="'Жилая недвижимость'"
                            :type-label2="'Коммерческая недвижимость'"
                            :data-name="['typeRoom']"
                            style1="width: 1200px"
                            style2="width: 1200px"/>
        </div>
        <div v-if="dataRequest.typeRoom">
          <SearchMap @data="dataMap"/>
        </div>
        <button class="btnSubmit" type="button" v-on:click="changePage(0, 1)" id="submits">Далее</button>
      </div>
      <div class="group-1" id="group-1">
        <p class="textOrder">О здании</p>
        <input-create id="inputNumber1" subtitle="" title="Год постройки" name="yearCreate"/>
        <button-create @data="btnData" :cls="5" :data="['Кирпичный', 'Монолитный', 'Панельный', 'Блочный', 'Деревянный', 'Сталинский', 'Монолитно-кирпичный']" :data-value="['brick', 'monolithic', 'panel', 'block', 'wooden', 'stalinist', 'monolithicBrick']" :data-name="['typeHouse']" :type-label="'Тип дома'" style="width: 800px;"/>
        <button class="btnSubmit" type="button" v-on:click="changePage(1, 2)" id="submits">Далее</button>
      </div>
      <div id="group-2" class="group-2">
        <p class="textOrder">Параметры квартиры</p>
        <button-create @data="btnData" :cls="3"
                       :data="['Студия','1','2','3','4','5','6+']"
                       :data-value="['studio', '1','2','3','4','5','6']"
                       :data-name="['roomCount']"
                       :type-label="'Количество комнат'"/>
        <input-create subtitle="м²" name="areaRoom" title="Общая площадь"/>
        <input-create subtitle="м²" name="areaLifeRoom" title="Жилая площадь"/>
        <br>
        <input-create subtitle="м²" name="areaKitchenRoom" title="Площадь кухни"/>
        <br>
        <input-create subtitle="" name="floor" title="Этажей"/>
        <input-create subtitle="" name="floorAllHouse" title="Этажей в доме"/>
        <button-create
          @data="btnData"
          :cls="4"
          :data="['Квартира','Апартаменты']"
          :data-value="['flat', 'apartaments']"
          :data-name="['typeState']"
          :type-label="'Тип недвижемости'"/>
        <input-create id="inputNumber0" subtitle="" name="numApart" title="Номер квартиры"/>
        <div class="numApart">
          <img class="numApartImg" src="/image/glassOrg.png" alt="" >
          <p class="numApartText">Мы не покажем номер квартиры</p>
        </div>
        <button class="btnSubmit" type="button" v-on:click="changePage(2, 3)" id="submits">Далее</button>
      </div>
      <div class="group-3" id="group-3">
        <p class="textOrder">Фотографии и планировка</p>
        <p class="subTitleOrder">Фотографии и планировка - от 5 и больше</p>
        <img src="/image/phtotCamera.png" class="cameraIcon" width="42" alt="">
        <p class="camText">На фото не должно быть людей, животных, алкоголя, табака, оружия. <br> Не добавляйте чужие фото, картинки с водяными знаками и рекламу </p>
        <button type="button" class="btnDeleteImg" @click="activateDeleteBtn" v-if="photoImgsAll.size >= 1">Удалить изображения</button>
        <div class="photoGroupLocation">
          <div class="camLoadPhoto">
            <button type="button" class="camGroupLoadPhoto" v-on:click="loadPhoto">
              <label for="photoLoadImage" class="photoloadImg">
                <div class="backWhiteLoadPhoto" style="display: inline-block">
                  <img class="iconLoadPhoto" src="/image/selectPhoto.jpg" alt="" style="display: inline-block;margin: 0 5px 0 0">
                  <input type="file" name="photoList" @change="selectPhoto" id="photoLoadImage" alt="" class="photoList" multiple>
                  <input type="file" name="photoList" @change="selectPhoto" id="photoLoadImageAllSelect" alt="" accept="image/*" class="photoListInvisible" multiple>
                </div>
              </label>
            </button>
            <button type="button" class="btnLeftScrollPhoto" id="btnLeftScrollPhoto" v-on:click="photoList('left')"><img src="/image/left.png" alt="" class="imgLeftScroll" width="32px"></button>
          </div>
          <div class="photoGroup" id="photoCollection">
            <img-select :imghash="hash" :func="deleteImg" v-for="(hash, i) in this.photoImgsAll"/>
            <video :src="vHash" v-for="vHash in this.photoVidAll"></video>
          </div>
          <div class="backgroundPhoto"></div>
          <button type="button" class="btnRightScrollPhoto" id="btnRightScrollPhoto" v-on:click="photoList('right')"><img src="/image/left.png" alt="" class="imgRightScroll" style="transform: rotate(180deg)" width="32px"></button>
        </div>
<!--        <button type="button" v-on:click="savePhoto" style="font-size: 56px">request</button>-->
        <button class="btnSubmit" type="button" v-on:click="changePage(3, 4)" id="submits">Далее</button>
      </div>
      <div class="group-4" id="group-4">
        <button class="btnSubmit" type="button" v-on:click="changePage(4, 5)" id="submits">Далее</button>
      </div>
    </div>
    <button class="btnSubmit" type="submit" id="submit" style="margin-top: 0">Отправить</button>
  </form>
</div>
</template>

<script>

import axios from "axios";
import {computed, defineComponent} from "vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import ButtonCreate from "../Components/buttonCreate.vue";
import SearchMap from "../Components/SearchMap.vue";
import InputCreate from "@/Components/inputCreate.vue";
import ButtonCreateT2 from "../Components/buttonCreateT2.vue";
import DeleteBtn from "@/Components/deleteBtn.vue";
import imgSelect from "../Components/imgSelect.vue";
import ImgSelect from "@/Components/imgSelect.vue";
export default defineComponent({
  props: {
  },
  computed: {
    dataPhotoImg() {
      return this.dataPhotoLoad
    },
    data() {
      return data
    },
  },
  components: {ImgSelect, imgSelect, DeleteBtn, ButtonCreateT2, InputCreate, SearchMap, Map, ButtonCreate, Footer, Header},
  data(){
    return{
      photoImgsAll: new Map([]),
      photoVidAll: new Map([]),
      dataPhotoLoad: [],
      dataRequest: {},
      countListFlip: 1,
      photoImg: {},
    }
  },
  mounted() {
    let groupPhoto = document.getElementById('photoCollection')
    groupPhoto.style.marginLeft = '270px'
  },
  methods: {
    activateDeleteBtn(){
      let btn = document.getElementsByClassName('deleteImg')
      for (let i = 0; i < btn.length; i++) {
        if (btn[i].style.display === 'block'){
          btn[i].style.display = 'none'
        }
        else {
          btn[i].style.display = 'block'
        }
      }
    },
    deleteImg(target){

      let groupPhoto = document.getElementById('photoCollection')
      let photo = document.getElementsByClassName('imgCollection')
      let btnLeft = document.getElementById('btnLeftScrollPhoto')
      let btnRight = document.getElementById('btnRightScrollPhoto')
      let widthPhotoList = 0
      let marginLeft = groupPhoto.style.marginLeft.replace( /[a-z]/g,'')
      let countFlip = 0

      for (let i = 0; i < photo.length; i++) {
        widthPhotoList += photo[i].width+25
      }
      console.log()
      for (let k = 0; k < photo.length;k++) {
        if (photo[k] === target.parentElement.getElementsByClassName('imgCollection')[0]){
          this.photoImgsAll.delete(target.parentElement.getElementsByClassName('imgCollection')[0].attributes.alt.value)
        }
      }

      if (widthPhotoList > 1000){
        btnRight.style.display = 'inline-block'
      }else {
        btnRight.style.display = 'none'
      }
      console.log(this.dataPhotoLoad)
      console.log(this.photoImgsAll)
    },
    savePhoto(){
      let key = []
      let hash = []
      this.photoImgsAll.forEach((value, keys) => {
        key.push(keys)
        hash.push(value)
      })

      axios.post('/uploadPhoto', {key, hash}, {headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
        .then(response => {
          console.log(response)
        })
    },
    selectPhoto(){
      let btn = document.getElementsByClassName('deleteImg')
      const photoImgs = document.getElementById('photoLoadImage')
      let photoColl = document.getElementById('photoCollection')
      let photoColls = document.getElementsByClassName('photoCollection')
      let photoCollect = document.getElementsByClassName('photoGroup')
      let photo = document.getElementsByClassName('imgCollection')
      let btnRight = document.getElementById('btnRightScrollPhoto')
      let date = new Date()
      let widthPhotoList = 0
      let photoImg
      let photoImgAll = new Map()
      const regI = /image/;
      const regV = /video/;
      let timeStamp = []
      // const readFile = new FileReader()

      for (let z = 0; z < photoImgs.files.length; z++) {
        console.log(photoImgs.files[z])
        if (regI.test(photoImgs.files[z].type)){
          photoImgAll[z] = new File([photoImgs.files[z]], timeStamp[z] = date.getMilliseconds()+date.getDate()*Math.random(7,99)+'.'+photoImgs.files[z].type.replace('image/', ''))
          this.photoImgsAll.set(photoImgAll[z].name, photoImgAll[z])
        }
        if (regV.test(photoImgs.files[z].type)){
          photoImgAll[z] = new File([photoImgs.files[z]], timeStamp[z] = date.getMilliseconds()+date.getDate()*Math.random(7,99)+'.'+photoImgs.files[z].type.replace('video/', ''))
          this.photoVidAll.set(photoImgAll[z].name, photoImgAll[z])
        }
      }

        for (let r = 0; r < photoImgs.files.length; r++) {
          if (photoImgs.files.length > 0 && regI.test(photoImgs.files[r].type)){
            photoImg = new File([photoImgs.files[r]],  date.getMilliseconds()+date.getDate()*Math.random(7,99)+'.'+photoImgs.files[r].type.replace('image/', ''))
            const readFile = new FileReader()
            readFile.readAsDataURL(photoImgs.files[r])

            for (let i = 0; i < btn.length; i++) {btn[i].style.display = 'none'} //отключение кнопок делит

            readFile.onload = () => {
              for (let i = 0; i < photo.length; i++) {
                widthPhotoList += photo[i].width+25
              }
              let img = new Image()
              img.src = readFile.result
              img.onload = () => {
                img.width = img.width / (img.height / 120)
                if (img.width+widthPhotoList > 780){
                  btnRight.style.display = 'inline-block'
                }
              }
              if (widthPhotoList > 780){
                btnRight.style.display = 'inline-block'
              }
              // this.dataPhotoLoad[photoImgAll[r]['name']] = readFile.result
              this.photoImgsAll.set(timeStamp[r], readFile.result)

            }
          }

          if (photoImgs.files.length > 0 && regV.test(photoImgs.files[r].type)){
            console.log(photoImgs.files[0])

            // photoImg = new File([photoImgs.files[r]],  date.getMilliseconds()+date.getDate()*Math.random(7,99)+'.'+photoImgs.files[r].type.replace('video/', ''))
            const readFile = new FileReader()
            readFile.readAsDataURL(photoImgs.files[r])

            readFile.onload = () => {
              console.log(readFile)
            }
            //
            // for (let i = 0; i < btn.length; i++) {btn[i].style.display = 'none'} //отключение кнопок делит
            //
            // readFile.onload = () => {
            //   for (let i = 0; i < photo.length; i++) {
            //     widthPhotoList += photo[i].width+25
            //   }
            //   let img = new Image()
            //   img.src = readFile.result
            //   img.onload = () => {
            //     img.width = img.width / (img.height / 120)
            //     if (img.width+widthPhotoList > 780){
            //       btnRight.style.display = 'inline-block'
            //     }
            //   }
            //   if (widthPhotoList > 780){
            //     btnRight.style.display = 'inline-block'
            //   }
            //   // this.dataPhotoLoad[photoImgAll[r]['name']] = readFile.result
            //   this.photoVidAll.set(timeStamp[r], readFile.result)
            //
            // }
          }
        }

      photoImgs.value = ''
    },
    photoList(orient){
      let groupPhoto = document.getElementById('photoCollection') //div всех изображений
      let photo = document.getElementsByClassName('imgCollection') //все изображения полученные по классу "для получения widthPhotoList(длины всех изображений)"
      let btnLeft = document.getElementById('btnLeftScrollPhoto') //левая стрелка
      let btnRight = document.getElementById('btnRightScrollPhoto') //правая стрелка
      let widthPhotoList = 0 //длина массива изображений
      let marginLeft = groupPhoto.style.marginLeft.replace( /[a-z]/g,'')-270 //отступ массива изображений
      //длина видимого поля 750px (groupPhoto)
      //1000px
      // groupPhoto.style.marginLeft = '0px'
      for (let i = 0; i < photo.length; i++) {
        widthPhotoList += photo[i].width+25
      }

      switch (orient){
        case 'left':
          if (marginLeft >= -270){
            marginLeft = 270
            btnLeft.style.display = 'none'
          }
          else {
            marginLeft = marginLeft - -540
            btnRight.style.display = 'inline-block'
          }
          break;
        case 'right':
          if (widthPhotoList+marginLeft < 1000){
            marginLeft = -widthPhotoList+1000
            btnRight.style.display = 'none'
          }
          else {
            marginLeft - 360
            btnLeft.style.display = 'inline-block'
          }
          break;
      }

      console.log(marginLeft)
      // console.log(widthPhotoList)


      groupPhoto.style.marginLeft = marginLeft+'px'
    },
    changePage(i, k){
      document.getElementById('group-'+i).style.opacity = '0%'
      setTimeout(() => document.getElementById('group-'+i).style.display = 'none', 300)
      setTimeout(() => document.getElementById('group-'+k).style.display = 'block', 300)
    },
    btnData(name, value){
      this.dataRequest[name] = value
      console.log(this.dataRequest)
    },
    dataMap(data, name){
      this.dataRequest[name] = data
      console.log(this.dataRequest)
    }
  }
},
)
</script>

<style>
body{
  overflow-x: hidden;
}
.group-0{display: none;transition: all .3s;}
.group-0.1{display:none;transition: all .3s;}
.group-0.2{display: none;transition: all .3s;}
.group-1{display: none;transition: all .3s;}
.group-2{display: none;transition: all .3s;}
//.group-3{display: none;transition: all .3s;}
.group-4{display: none;transition: all .3s;}

.photoListInvisible{
  display: none;
}
.btnDeleteImg{
  margin: 0 0 0 30px;
  border: solid #b2b2b2;
  border-radius: 5px;
  background: none;
  padding: 5px 15px;
  font-size: 18px;
  font-weight: 600;
  position: absolute;
}
.deleteImg{
  //display: grid;
  background: none;
  border: none;
  position: absolute;
  display: none;
}
.groupImgCollection{
  display: grid;
  height: 120px;
  justify-items: center;
  align-items: center;
}
.photoloadImg{
  cursor: pointer;
}
.photoList{
  display: none;
}
.imgLeftScroll{
  display: inline-block;
}
.imgRightScroll{
  display: inline-block;
}
.btnLeftScrollPhoto{
  border: none;
  background: none;
  //position: absolute;
  display: none;
  z-index: 1;
  padding: 22px 10px 22px 5px;
}
.btnRightScrollPhoto{
  border: none;
  background: none;
  position: absolute;
  display: none;
  z-index: 1;
  padding: 44px 20px;
  top: 325px;
  left: 1020px;
}
.backgroundPhoto{
  background: #ffffff;
  width: 1200px;
  height: 120px;
  margin: 0 0 0 1020px;
  position: absolute;
  top: 325px;
  z-index: 1;
}
.photoGroup{
  display: inline-flex;
  margin: 10px 0 0 270px;
  transition: all 1s;
  position: absolute;
}
.camGroupLoadPhoto{
  border: none;
  background: none;
}
.camLoadPhoto{
  cursor: pointer;
  display: inline-block;
  border: none;
  background: white;
  height: 130px;
  padding: 10px 0 0 55px;
  position: absolute;
  z-index: 1;
}
img {
  -webkit-user-drag: none;
}
.loadPhoto{
  user-select: none;
  -webkit-user-drag: none;
}
.btnLeft{
  border: none;
  background: none;
  display: none;
}
.btnRight{
  background: none;
  border: none;
  margin: 60px 0 0 10px;
  display: inline-block;
}
.backWhiteLoadPhoto{
  background: white;
  user-select: none;
  -webkit-user-drag: none;
}
.rightBackFlip{
  -webkit-user-drag: none;
  user-select: none;
  margin: 48px 0 0 10px;
  opacity: 70%;
}
.backFlip{
  -webkit-user-drag: none;
  height: 155px;
  width: 1200px;
  background: white;
  position: absolute;
  margin: -155px 0 0 800px;
  user-select: none;
}
.photoGroupLocation {
  -webkit-user-drag: none;
  user-select: none;
  height: 155px;
  margin: 0 0 0 0;
}
.imgCollection{
  height: 120px;
  margin: 0 10px 0 15px;
}
.camText{
  font-weight: 600;
  opacity: 90%;
}
.cameraIcon{
  opacity: 80%;
  display: inline-block;
  margin: -28px 15px 0 45px;
}
.numApartImg{
  margin: -3px 0 0 0;
}
.numApartText{
  margin: 0 0 0 10px;
}
.numApart{
  margin: 0 0 0 55px;
}
.mapGroup{
  display: flex;
}
.contentOrderCreate{
  display: block;
}
.textOrder{
  font-size: 40px;
  font-weight: 600;
  margin: 0 0 0 45px;
  display: block;
}
.subTitleOrder{
  font-size: 24px;
  font-weight: 600;
  margin: 15px 0 20px 55px;
  display: block;
}
.btnSubmit{
  margin: 250px 0 50px 1650px;
  font-size: 24px;
  font-weight: 600;
  padding: 10px 25px;
  border: solid #ffffff 1px;
  border-radius: 5px;
  background: #499ABF;
  color: white;
}
</style>
