<h2 class="content__main-heading">Добавление занятия</h2>

<form class="form" action="" method="post" autocomplete="off">
  <div class="form__row">
    <label class="form__label" for="lesson_name">Название <sup>*</sup></label>
    <input class="form__input" type="text" name="name" id="lesson_name" value="" placeholder="Введите название занятия">
  </div>

   <div class="form__row">
     <label class="form__label" for="date">Дата занятия</label>
     <input class="form__input form__input--date" type="text" name="date" id="date" value="" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
   </div>

   <div class="form__row">
     <label class="form__label" for="topics_count">Количество тем <sup>*</sup></label>
     <input class="form__input" type="number" name="topics_count" id="topics_count" value="" placeholder="Введите количество тем">
   </div>

  <div class="form__row form__row--controls">
    <input class="button" type="submit" name="" value="Добавить">
  </div>
</form>
