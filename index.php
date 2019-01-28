<?php
include 'includes/header.php'
?>
  <div id="pageintro" class="hoc clear">
    <div class="flexslider basicslider">
      <ul class="slides">
        <li>
          <article class="opaque">
            <p>Egestas</p>
            <h3 class="heading">Elementum dictum</h3>
            <p>Cursus mauris vitae ligula accumsan sed</p>
            <footer>
              <form class="group" method="post" action="#">
                <fieldset>
                  <legend>Sign-Up:</legend>
                  <input type="email" value="" placeholder="Email Here&hellip;">
                  <button class="fa fa-sign-in" type="submit" title="Submit"><em>Submit</em></button>
                </fieldset>
              </form>
            </footer>
          </article>
        </li>
        <li>
          <article class="opaque">
            <p>Pulvinar</p>
            <h3 class="heading">Viverra iaculis</h3>
            <p>Orci nam nec dolor dapibus dignissim tortor</p>
            <footer><a class="btn" href="#">Facilisis etiam</a></footer>
          </article>
        </li>
        <li>
          <article class="opaque">
            <p>Maximus</p>
            <h3 class="heading">Tincidunt viverra</h3>
            <p>Sed feugiat tellus quisque vehicula convallis</p>
            <footer><a class="btn" href="#">Efficitur convallis</a></footer>
          </article>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="wrapper row3 coloured">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div id="introblocks">
      <ul class="nospace group attach">
          <?php
          $result=listThreeDesc("recipe");
          $i=0;
          while ($row=fetch_array($result)){
              if ($i==0){
                  echo "<li class=\"one_third first marginTop2\">";
              }else{
                  echo "<li class=\"one_third marginTop2\" >";
              }
              echo "<article><div>";
              echo "<h6 class=\"heading\">".$row['name']."</h6>";
              echo "<p>Ready-In: ".$row['ready']." mins</p>";
              echo "</div>";
              echo "<img src=\"images/recipe/".$row['photo']."\" alt=\"\">";
              echo "<footer><a href=\"recipeDetail.php?id=".$row['id']."\">More Details</a></footer>";
              echo "</article></li>";
              $i++;
          }
          ?>
      </ul>
    </div>
    <p class="center"><a class="btn blue" href="recipe.php">See More</a></p>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

    <div class="wrapper bgded overlay" style="background-image:url('images/background1.jpg');">
        <main class="hoc container clear">
            <!-- main body -->
            <div id="introblocks">
                <ul class="nospace group ">
                    <li class="one_third first">
                        <article>
                            <div>
                                <h6 class="heading">Lacinia vivamus lorem</h6>
                                <p>Order vegetables to avoid unwanted hassle ofasdf adf af asdf ej f efje fjr  going to the market</p>
                            </div>
                            <img src="images/demo/320x180.png" alt="">
                            <footer><a href="#">More Details</a></footer>
                        </article>
                    </li>
                    <li class="one_third">
                        <article>
                            <div>
                                <h6 class="heading">Aliquam dolor blandit</h6>
                                <p>Posuere lectus leo facilisis nisi nunc nibh nibh consectetur vel consectetur consequat eget neque [&hellip;]</p>
                            </div>
                            <img src="images/demo/320x180.png" alt="">
                            <footer><a href="#">More Details</a></footer>
                        </article>
                    </li>
                    <li class="one_third">
                        <article>
                            <div>
                                <h6 class="heading">Nibh aliquam imperdiet</h6>
                                <p>Dolor in turpis ultricies faucibus nunc eu turpis lobortis iaculis suspendisse vel tincidunt lectus [&hellip;]</p>
                            </div>
                            <img src="images/demo/320x180.png" alt="">
                            <footer><a href="#">More Details</a></footer>
                        </article>
                    </li>
                </ul>
            </div>
            <p class="center"><a class="btn blue" href="#">See More</a></p>
            <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>

<div class="wrapper bgded overlay coloured" >
  <section class="hoc container clear">
    <!--<div class="sectiontitle center">-->
      <!--&lt;!&ndash;<h3 class="heading">Select a feature</h3>&ndash;&gt;-->
    <!--</div>-->
    <ul class="nospace group center">
      <li class="one_third first">
        <article><a href="#"><img class="btmspace-30 icon" src="images/diet.png"></img></a>
          <h6 class="heading font-x1">Shop Vegetables</h6>
          <p>Order vegetables to avoid unwanted hassle of going to the market</p>
          <!--<footer><a href="#">Read More &raquo;</a></footer>-->
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="btmspace-30 icon fa fa-stove"></i></a>
          <h6 class="heading font-x1">Order Chopped Vegetables</h6>
          <p>Choose preprocessed (Sliced & Diced) vegetables to be cooked directly.</p>
          <!--<footer><a href="#">Read More &raquo;</a></footer>-->
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="btmspace-30 icon fa fa-mortar-pestle"></i></a>
          <h6 class="heading font-x1">Explore your inner chef</h6>
          <p>Choose a recipe and get the exact ingredients at your doorstep.</p>
          <!--<footer><a href="#">Read More &raquo;</a></footer>-->
        </article>
      </li>
    </ul>

  </section>
</div>


<?php
include 'includes/footer.php'
?>