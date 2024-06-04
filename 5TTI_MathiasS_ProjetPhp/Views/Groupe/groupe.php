<?php  if(!verifyIsJoined($pdo)) {
    joinGroupe($pdo);
} ?>
<link rel="stylesheet" href="/Assets/Css/groupe.css">

<?php 
    $groupeGrade = selectMembreGrade($pdo); 
    $groupeInfo = selectGroupeInfo($pdo);
?>
<div class="pageGroupe">
    <div class="listeSalon">
        <p class="Groupe"><?= $groupeInfo[0]->groupeName ?></p>
        <?php if($groupeGrade=="dux" || $groupeGrade=="adm") : ?>
            <a href="/addsalon/<?= $_SESSION["groupe"] ?>"><h3>Ajouter un salon</h3></a>
        <?php endif; ?>
        <?php foreach ($salons as $salon) : ?>
            <a onclick="<?= $salonIdPage = $salon->salonId ?>" href="/groupe/<?= $_SESSION["groupe"] ?>/<?= $salonIdPage ?>"><p>| - <?= $salon->salonName ?></p></a>
        <?php endforeach ?>
        <?php
            if (($groupeGrade=="dux" || $_SESSION["user"]->userRank=="adm" || $_SESSION["user"]->userRank=="dux") && !isset($salon)) {
                echo " <a onclick=\"if (!confirm('Souhaitez vous vraiment supprimer le groupe ? ')){ event.preventDefault(); }\" href='/destroyGroupe/".$_SESSION['groupe']."'><button class='button'><p>Suppression du groupe</p></button></a>";
            }
            if (($groupeGrade=="dux" || $groupeGrade=="adm") && isset($_SESSION["salon"])) {
                echo " <a onclick=\"if (!confirm('Souhaitez vous vraiment supprimer le salon ? ')){ event.preventDefault(); }\" href='/destroySalon/".$_SESSION['groupe']."'><button class='button'><p>Suppression du salon</p></button></a>";
            }
        ?>
        <p class="bottomSalon">;</p>
    </div>
    <?php if (isset($_SESSION["salon"])) : ?>
        <div style="min-width: 50%">
            <?php if($groupeGrade != "mut"): ?>
                <form action="" method="post">
                    <div>
                        <label>
                            <input label="Message" required="true" maxlength="250" type="text" name="newmess">
                        </label>                
                    </div>
                <button type="submit" name="postmess" class='button'><p>Envoyer</p></button>
                </form>
            <?php endif; ?>
            <?php foreach ($messages as $message) : ?>
                <?php $user=selectusermessage($pdo, $message->userId);
                $membre=selectmembreinfo($pdo, $message->userId); 
                $date = date_create($message->messageDate);
                $part = explode(":", $message->messageTexte);
                if($part[0]=="http" || $part[0]=="https") :?>
                <div class="message">
                        <div class="messtop">
                            <a href="/membre/<?= $user[0]->userId?>/<?=$_SESSION["groupe"]?>"><p class="<?=$membre[0]->membreRank ?>"><?= $user[0]->userName ?></p></a>
                            <div style="display: flex;">
                                <p><?= date_format($date,"d/m/y H:i"); ?></p>
                                <?php if(($user[0]->userId==$_SESSION["user"]->userId) &&  $groupeGrade != "mut"|| $_SESSION["user"]->userId== "dux" || $_SESSION["user"]->userId=="adm" || $_SESSION["user"]->userId=="mod" || $groupeGrade== "dux" || $groupeGrade=="adm" || $groupeGrade=="mod"): ?>
                                    <a onclick="<?= $mess= $message->msgId ?>" onclick=\if (!confirm('Souhaitez vous vraiment supprimer le salon ? ')){ event.preventDefault(); }\" href='/destroyMess/<?= $mess ?>'><img class='littleIcon' src='/Assets/Images/suppress.png' alt='suppress'></a>;
                                <?php endif ?>
                            </div>
                        </div>
                        <a href=<?= $message->messageTexte ?>><p><?= $message->messageTexte ?></p></a>
                    </div>
                <?php else : ?>
                    <div class="message">
                        <div class="messtop">
                            <a href="/membre/<?= $user[0]->userId?>/<?=$_SESSION["groupe"]?>"><p class="<?=$membre[0]->membreRank ?>"><?= $user[0]->userName ?></p></a>
                            <div style="display: flex;">
                                <p><?= date_format($date,"d/m/y H:i"); ?></p>
                                <?php if(($user[0]->userId==$_SESSION["user"]->userId) &&  $groupeGrade != "mut"|| $_SESSION["user"]->userId== "dux" || $_SESSION["user"]->userId=="adm" || $_SESSION["user"]->userId=="mod" || $groupeGrade== "dux" || $groupeGrade=="adm" || $groupeGrade=="mod"): ?>
                                    <a onclick="<?= $mess= $message->msgId ?>" onclick=\if (!confirm('Souhaitez vous vraiment supprimer le salon ? ')){ event.preventDefault(); }\" href='/destroyMess/<?= $mess ?>'><img class='littleIcon' src='/Assets/Images/suppress.png' alt='suppress'></a>;
                                <?php endif ?>
                            </div>
                        </div>
                        <p><?= $message->messageTexte ?></p>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>