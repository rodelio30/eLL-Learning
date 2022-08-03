<br>
<div class="row justify-content-md-center">
  <div class="col-lg-8 order-1 order-lg-2" data-aos="fade-right" data-aos-delay="100">
    <?php

    include('../include/connect.php');
    $result = mysqli_query($conn, "select course_id, cat_no, name, description, no_of_units, hours, preq, lab_equipment from courses WHERE status!='archive' ORDER BY cat_no ASC") or die("Query 1 is incorrect....");
    while (list($course_id, $cat_no, $name, $description, $no_of_units, $hours, $preq, $lab_equipment) = mysqli_fetch_array($result)) {
      echo " 
    <table class='table table-bordered'>
          <tbody>
            <tr>
              <td style='width:25%;'>Catalogue Number</td>
              <td class='text-center'>:</td>
              <th colspan='2'>$cat_no</th>
            </tr>
            <tr>
              <td>Course Name</td>
              <td class='text-center'>:</td>
              <th colspan='2'>$name</th>
            </tr>
            <tr>
              <td>Course Description</td>
              <td class='text-center'>:</td>
              <td colspan='2'>$description</td>
            </tr>
            <tr>
              <td>Course Outcomes</td>
              <td class='text-center'>:</td>
              <td colspan='2'></td>
            </tr>
            <tr>
              <td>No. of Units</td>
              <td class='text-center'>:</td>
              <th colspan='2'>$no_of_units</th>
            </tr>
            <tr>
              <td>No. of contact hrs/wk</td>
              <td class='text-center'>:</td>
              <th colspan='2'>$hours</th>
            </tr>
            <tr>
              <td>Prerequisites</td>
              <td class='text-center'>:</td>
              <th colspan='2'>$preq</th>
            </tr>
            <tr>
              <td>Course Outline</td>
              <td class='text-center'>:</td>
              <td colspan='2'> </td>
            </tr>
            <tr>
              <td>Laboratory Equipment</td>
              <td class='text-center'>:</td>
              <td colspan='2'>$lab_equipment</td>
            </tr>
            <tr>
              <td>Suggested Reading</td>
              <td class='text-center'>:</td>
              <td colspan='2'>
              </td>
            </tr>
          </tbody>
    </table>
    <hr>
        ";
    }
    ?>
  </div>
</div>

<br>
<div class="row justify-content-md-center">
  <div class="col-lg-8 order-1 order-lg-2" data-aos="fade-right" data-aos-delay="100">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td style="width:25%;">Catalogue Number</td>
          <td class="text-center">:</td>
          <th colspan="2">LITT 1101</th>
        </tr>
        <tr>
          <td>Course Name</td>
          <td class="text-center">:</td>
          <th colspan="2">Introduction to Literature and Literary Studies</th>
        </tr>
        <tr>
          <td>Course Description</td>
          <td class="text-center">:</td>
          <td colspan="2">The course familiarizes the students with the
            fundamentals of the scholarly discipline of literary
            studies, specifically its history and practice. It prepares
            the students for endeavors that require the tools of both
            scholar5s and lifelong learners, including literary and
            rhetorical expressions, critical and imaginative thinking,
            creative and effective presentation and productions,
            social and cultural analysis, and the basic concepts,
            genres, approaches, and methods in such undertakings.</td>
        </tr>
        <tr>
          <td>Course Outcomes</td>
          <td class="text-center">:</td>
          <td colspan="2">1. Identify time periods in the history of literature
            and criticism in the West and non-west.
            <br>
            2. Demonstrate knowledge and understanding of
            time periods, basic theoretical and
            methodological orientations and literary
            movements.
            <br>
            3. Read and write critically and creatively in the
            understanding of literary studies as practice.
            <br>
            4. Interpret literary and cultural productions that
            are text-specific and context-specific.
            <br>
            5. Deploy reading and writing strategies in the
            production of materials for a variety of rhetorical
            contexts, including oral presentations and
            creative productions.
          </td>
        </tr>
        <tr>
          <td>No. of Units</td>
          <td class="text-center">:</td>
          <th colspan="2">3</th>
        </tr>
        <tr>
          <td>No. of contact hrs/wk</td>
          <td class="text-center">:</td>
          <th colspan="2">3</th>
        </tr>
        <tr>
          <td>Prerequisites</td>
          <td class="text-center">:</td>
          <th colspan="2"></th>
        </tr>
        <tr>
          <td>Course Outline</td>
          <td class="text-center">:</td>
          <td colspan="2">1. What is Literary? What is “Theory”? What is Literature?
            <br>
            2. History of “theory” from the Ancient to the
            Postmodern Period.
            <br>
            3. Language and Meaning: Poetic, ?Narrative,
            Dramatic, Rhetorical
            <br>
            4. Texts and Contexts: text-specific and Context-specific Critical orientations
            <br>
            5. Concepts, Approaches, Methods
          </td>
        </tr>
        <tr>
          <td>Laboratory Equipment</td>
          <td class="text-center">:</td>
          <td colspan="2">None</td>
        </tr>
        <tr>
          <td>Suggested Reading</td>
          <td class="text-center">:</td>
          <td colspan="2">Abad, Gemino H. Ed. The Likhaan Anthology of
            Philippine Literature in Englishfrom 1900 to the
            Present. Manila: UP Press, 1999.
            <br>
            Clinton, Jerome W. et.al. eds. The Norton Anthology of
            World Masterpieces. Expanded Ed.: WW Norton &
            Co., 1997.
            <br>
            Francia, Luis, Ed. Brown River, White Ocean: An
            Anthology of Twentieth-Century Philippine Literature
            in English.
            <br>
            Rutgers University Pree, 1993.
            <br>
            Holt, Rheinhart and Winston Hold, Eds. World
            Literature. Holt McDougal, 2000.
            <br>
            Hornstein, Lilian H. et.al. Eds. The Reader's Companion
            to World Literature, Signet Classics, 2002
            <br>
            Lumbera, Bienvido and Cynthia Nograles Lumbera, Eds.
            Philippine Literature: A History and Anthology.
            National Book Store, 1982.
            <br>
            Magill, Frank N., Ed. Masterpieces of World Literature,
            Collins Reference, 1991
            <br>
            Siemens, Ray and Schreibman, Susan. Eds. A
            Companion to Digital Literary Studies. Wiley-Blackwell. 2013.
            <br>
            Pugh, Tioson and Johnson, Margaret E. Eds. Literary
            Studies: A Practical Guide. Routledge. 2013.
            <br>
            Durant, Alan and Fabb, Nigel. Eds. Literary Studiesin
            Action (interface). Routledge: 1 edition, 1990
            <br>
            Levander, Caroline F. and Levine, Robert S. Eds. A
            Companion to American Literary Studies (Blackwell
            Companions to Literature and Culture). Blackwell; 1
            edition, 2015
            <br>
            Garber, Marjorie and Chapin Simpson, Walter. Eds. A
            Manifesto for Literary Studies. Walter Chapin
            <br>
            Simpson Center for the Humanities, 2004
            <br>
            Huang, Guiyou. Ed. Asian American Literary Studies
            (Introducing Ethnic Studies EUP). Edinburgh
            <br>
            University Press; 1 edition, 2005
            <br>
            Cornell, Paul Jay Ed. Global Matters: The Transnational
            Turn in Literary Studies. Cornell University Press, 1
            edition, 2010
            <br>
            Klarer, Mario. An Introduction to Literary Studies.
            Routledge; 2 edition, 2004.
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>