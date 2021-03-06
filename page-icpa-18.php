<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header('icpa');
?>

<div class="jumbotron jumbotron-fluid icpa-18">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-3 col-md-2">
        <img class="logo" alt="ICPA-18 logo" src="<?php echo get_template_directory_uri(); ?>/img/icpa-18-logo.png"/>
      </div>
      <div class="col-8 col-md-9">
        <h1 class="display-1 display-responsive mb-0">18th International Conference on Positron Annihilation</h1>
      </div>
    </div>
    <div class="row mb-3 mb-md-4">
      <div class="col-12 col-md-10 col-lg-9">
        <hr class="mt-4 mb-5" />
        <p>We are honored to host 18th ICPA conference in US. Register to attend talks on positron annihilation spectroscopy topics and say hello to colleagues in person. Apart of science you will have plenty of time to relax, have a drink and meet like-minded people.</p>
        <p>The event will be held in <strong>Orlando</strong>, "The City Beautiful", Florida in <strong>October 2018</strong>.</p>
      </div>
    </div>
    <?php if (is_user_logged_in()){ ?>
      <div class="mb-3 pt-lg-1">
        <a class="btn btn-warning" href="<?php echo home_url('/account'); ?>">Open your Account Page</a>
      </div>
    <?php } else { ?>
      <?php if (get_option('users_can_register')){ ?>
        <div class="mb-3 pt-lg-1">
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#register">
            Register for ICPA-18
          </button>
          <span class="btn btn-link btn-sm disabled ml-3 mr-1 grey hidden-xs-down">— OR —</span>
          <button type="button" class="btn btn-link ml-3 ml-sm-0" data-toggle="modal" data-target="#login">
            Login<span class="hidden-xs-down"> to your account</span>
          </button>
        </div>
      <?php } else { ?>
        <div class="mt-0 mt-md-4">
          <p class="lead text-warning"><strong>Registration opens Nov 2017</strong></p>
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</div>

<div class="container-wrapper container-wrapper-primary-darker e">
  <div class="container py-3 py-md-4">
    <div class="row py-2">
      <div class="col-lg-9">
        <p>The aim of this conference is to provide a platform for the positron researchers from all over the world to present their latest research results, communicate new ideas with colleagues face to face, and find partners for future international and domestic cooperation. </p>
        <p>The conference proceedings will be published in <a href="http://www.scientific.net/MSF">Materials Science Forum</a> and every submitted paper will be peer reviewed. The official language of the conference will be English.</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12">

      <h2 class="mt-4 mt-md-5 mt-lg-5 mt-xl-5">Conference Topics</h2>

      <ul class="row mt-3 spaced">
        <li class="col-md-6">Positron and positronium physics</li>
        <li class="col-md-6">Positron and positronium chemistry</li>
        <li class="col-md-6">Positron and positronium interaction with atoms and molecules</li>
        <li class="col-md-6">Theoretical calculation of positron states</li>
        <li class="col-md-6">Theoretical aspects of positron and prositronium and related physics</li>
        <li class="col-md-6">Positron high energy physics and recent development in antimatter</li>
        <li class="col-md-6">Recent development in antimatter</li>
        <li class="col-md-6">Polarized positrons</li>
        <li class="col-md-6">Nanomaterials</li>
        <li class="col-md-6">Polymers and porous materials</li>
        <li class="col-md-6">Metals and alloys</li>
        <li class="col-md-6">Semiconductors and nonmetallic materials</li>
        <li class="col-md-6">Surface and interface</li>
        <li class="col-md-6">PET and related medical applications</li>
        <li class="col-md-6">New progress in experimental techniques</li>
        <li class="col-md-6">Gamma induced positron spectroscopy</li>
        <li class="col-md-6">Complimentary techniques to positron annihilation</li>
      </ul>

      <h2 class="mt-4 mt-md-5">Conference co-chairs</h2>

      <ul class="row list-unstyled">
        <li class="media mt-3 mt-md-4 col-md-6 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/cochairs/farida-selim.jpg" alt="Faria Selim">
          <div class="media-body">
            <h5>Faria Selim</h5>
            Bowling Green State University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Bowling Green, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/cochairs/alex-weiss.jpg" alt="Alex Weiss">
          <div class="media-body">
            <h5>Alex Weiss</h5>
            The University of Texas at Arlington<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Arlington, USA
          </div>
        </li>
      </ul>

      <h2 class="mt-4 mt-md-5">North America Organizing Committee</h2>

      <ul class="row list-unstyled">
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>James Danielson</h5>
            University of California San Diego<span class="hidden-md-up">,</span><br class="hidden-sm-down"> San Diego, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Joe Grames</h5>
            Jefferson Lab<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Newport News, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Ayman Hawari</h5>
            North Carolina State University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> North Carolina, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Jerry Jean</h5>
            University of Missouri<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Columbia, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Ali R. Koymen</h5>
            University of Texas at Arlington<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Arlington, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Kelvin Lynn</h5>
            Washington State University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Pullman, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Peter Mascher</h5>
            McMaster University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Hamilton, Canada
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Peter Simpson</h5>
            University of Western Onatrio<span class="hidden-md-up">,</span><br class="hidden-sm-down"> London, Canada
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>J. David Van Horn</h5>
            University of Missouri<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Columbia, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Eric Vouter</h5>
            Jefferson Lab<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Newport News, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/user.jpg">
          <div class="media-body">
            <h5>Renwu Zhang</h5>
            California State University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> San Bernardino, USA
          </div>
        </li>
      </ul>

      <h2 class="mt-4 mt-md-5">International Advisory Committee</h2>

      <ul class="row list-unstyled">
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/peter-mascher.jpg" alt="Peter Mascher">
          <div class="media-body">
            <h5>Peter Mascher</h5>
            McMaster University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Hamilton, Canada
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/reinhard-krause-rehberg.jpg" alt="Reinhard Krause-Rehberg">
          <div class="media-body">
            <h5>Reinhard Krause-Rehberg</h5>
            Martin Luther University Halle-Wittenberg<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Leipzig, Germany
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/m-ashram-alam.jpg" alt="M. Ashram Alam">
          <div class="media-body">
            <h5>M. Ashram Alam</h5>
            University of Bristol<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Bristol, UK
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/bernardo-barbellini.jpg" alt="Bernardo Barbellini">
          <div class="media-body">
            <h5>Bernardo Barbellini</h5>
            Northeastern University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Boston, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/marie-france-barthe.jpg" alt="Marie France Barthe">
          <div class="media-body">
            <h5>Marie France Barthe</h5>
            Centre National de la Recherche Scientifique<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Orléans, France
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/roberto-bursa.jpg" alt="Roberto S. Bursa">
          <div class="media-body">
            <h5>Roberto S. Bursa</h5>
            Università degli Studi di Trento<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Trento, Italy
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/chen-zhi-quan.jpg" alt="Chen Zhi-quan">
          <div class="media-body">
            <h5>Chen Zhi-quan</h5>
            Wuhan University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Wuhan, China
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/jakub-cizek.jpg" alt="Jakub Cizek">
          <div class="media-body">
            <h5>Jakub Cizek</h5>
            Charles University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Prague, Czech Republic
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/bichitra-ganguly.jpg" alt="Bichitra Ganguly">
          <div class="media-body">
            <h5>Bichitra Ganguly</h5>
            Saha Institute of Nuclear Physics<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Kolkata, India
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/christoph-pascal-hugenschmidt.jpg" alt="Christoph Pascal Hugenschmidt">
          <div class="media-body">
            <h5>Christoph Pascal Hugenschmidt</h5>
            Technische Universität München<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Munich, Germany
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/gaetana-laricchia.jpg" alt="Gaetana Laricchia">
          <div class="media-body">
            <h5>Gaetana Laricchia</h5>
            University College London<span class="hidden-md-up">,</span><br class="hidden-sm-down"> London, UK
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/allen-mills.jpg" alt="Allen Mills">
          <div class="media-body">
            <h5>Allen Mills</h5>
            University of California<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Riverside, USA
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/yasuyuki-nagashima.jpg" alt="Yasuyuki Nagashima">
          <div class="media-body">
            <h5>Yasuyuki Nagashima</h5>
            Tokyo University of Science<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Tokyo, Japan
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/henk-schut.jpg" alt="Henk Schut">
          <div class="media-body">
            <h5>Henk Schut</h5>
            Delft University of Technology<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Delft, Netherlands
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/shirai-yasuharu.jpg" alt="Shirai Yasuharu">
          <div class="media-body">
            <h5>Shirai Yasuharu</h5>
            Kyoto University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Kyoto, Japan
          </div>
        </li>
        <li class="media mt-3 mt-md-4 col-md-6 col-lg-4 media-committee">
          <img class="d-flex mr-3" src="<?php echo get_template_directory_uri(); ?>/img/committee/james-sullivan.jpg" alt="James Sullivan">
          <div class="media-body">
            <h5>James Sullivan</h5>
            Australian National University<span class="hidden-md-up">,</span><br class="hidden-sm-down"> Canberra, Australia
          </div>
        </li>
      </ul>

      <h2 class="mt-4 mt-md-5">Important Dates</h2>
      <h3 class="display-4 mt-4">2017</h3>
      <hr class="my-3" />
      <dl class="row">
        <dt class="col-4 col-lg-3 py-1">February</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>First Announcement</strong></dd>
        <dt class="col-4 col-lg-3 py-1">June</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Second Announcement</strong></dd>
        <dt class="col-4 col-lg-3 py-1">November</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Opening of abstract submission, registration and accommodation</strong></dd>
      </dl>
      <h3 class="display-4 mt-4">2018</h3>
      <hr class="my-3" />
      <dl class="row">
        <dt class="col-4 col-lg-3 py-1">July</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Deadline for abstract submission</strong></dd>
        <dt class="col-4 col-lg-3 py-1">August</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Deadline for early registration</strong></dd>
        <dt class="col-4 col-lg-3 py-1">September</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Final announcement</strong></dd>
        <dt class="col-4 col-lg-3 py-1">October</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Opening of ICPA‐18</strong></dd>
        <dt class="col-4 col-lg-3 py-1">November</dt>
        <dd class="col-8 col-lg-9 py-1"><strong>Deadline for paper submission</strong></dd>
      </dl>
    </div>
  </div>
</div>

<div class="container-wrapper container-wrapper-primary-darker mt-5">
  <div class="container py-3 py-md-4">
    <div class="row justify-content-between py-2">
      <div class="col-md-6">
        <h2>Admission Fees</h2>
        <!-- <hr class="mb-3 mt-4" /> -->
        <table class="table no-border dark mt-4">
          <thead>
            <tr>
              <th class="pl-0 pt-1 border-0">
                Participant
              </th>
              <th class="pl-0 pt-1 border-0">
                Early Registration
              </th>
              <th class="pl-0 pt-1 border-0">
                After July 1, 2018
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="pl-0 border-0">
                Regular
              </td>
              <td class="pl-0 border-0">
                $450
              </td>
              <td class="pl-0 border-0">
                $500
              </td>
            </tr>
            <tr>
              <td class="pl-0 border-0">
                Student
              </td>
              <td class="pl-0 border-0">
                $250
              </td>
              <td class="pl-0 border-0">
                $300
              </td>
            </tr>
            <tr>
              <td class="pl-0 border-0">
                Accompany
              </td>
              <td class="pl-0 border-0">
                $200
              </td>
              <td class="pl-0 border-0">
                $250
              </td>
            </tr>
          </tbody>
        </table>
        <?php if (is_user_logged_in()){ ?>
          <div class="responsive-top-margin mb-4 pt-2 mb-sm-5 mb-md-0">
            <a class="btn btn-warning" href="<?php echo home_url('/account'); ?>">
              Open your Account Page
            </a>
          </div>
        <?php } else { ?>
          <?php if (get_option('users_can_register')){ ?>
            <div class="responsive-top-margin mb-4 pt-2 mb-sm-5 mb-md-0">
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#registerModal">
                Register for ICPA-18
              </button>
            </div>
          <?php } else { ?>
            <div class="mt-2 mt-md-4">
              <p class="text-warning"><strong>Registration opens Nov 2017</strong></p>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="col-md-5">
        <h2 class="mb-3">Correspondence</h2>
        <div class="dark">
          <p class="lead mt-4">Dr. Farida Selim</p>
          <p class="mt-3">Department of Physics and Astronomy <br />Bowling Green State University <br />Bowling Green, OH, USA, 43402</p>
          <dl class="row mt-3">
            <dd class="col-4"><strong>Phone</strong></dd>
            <dt class="col-8">+1 (509) 592-7240</dt>
            <dd class="col-4"><strong>E-mail</strong></dd>
            <dt class="col-8">faselim@bgsu.edu</dt>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

define('__ROOT__', get_template_directory());

require_once(__ROOT__.'/modals/modal-register.php');
require_once(__ROOT__.'/modals/modal-login.php');
require_once(__ROOT__.'/modals/modal-forgot-password.php');

get_footer('icpa');

?>
