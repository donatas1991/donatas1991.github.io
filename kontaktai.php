<?php include 'header.php' ?>

<div class="container">
<div class="contacts">
    <table>
        <tr>
            <td><i class="fa fa-home" aria-hidden="true"></i></td>
            <td>ADRESAS:</td>
            <td>Paplūdimio g. 5, Inturkė, LT-33212 Molėtų r.</td>
        </tr>
        <tr>
            <td><i class="fa fa-phone"></i></td>
            <td>TEL:</td>
            <td><a href="tel:+37067520267">+37067520267</a></td>
        </tr>
        <tr>
            <td><i class="fa fa-envelope"></i></td>
            <td>EL.PAŠTAS:</td>
            <td><a href="mailto:inturkeslaiptai@gmail.com">inturkeslaiptai@gmail.com</a></td>
        </tr>
    </table>
    


<form>
    <p>Susisiekite Su Mumis</p><br><br>
    <label for="name">Jūsų vardas</label><br><br>
    <input type="text" id="name" value=""><br><br>
    <label for="email">Jūsų El-Paštas</label><br><br>
    <input type="email" name="email" id="email"><br><br>
    <label for="text">Jūsų žinutė</label><br><br>
    <textarea name="text" id="text" cols="30" rows="10"></textarea><br>
    <button>Susisiekti</button>
</form>

</div>
</div>


<?php include 'footer.php' ?>


<!-- iconele vietoj rounded irasyti ikona kokios nori -->
<!-- <i class="fa fa-cog rounded"></i> -->