
    <?php
    if(isset($_SESSION['count']))
    {
        $_SESSION['count']=$_SESSION['count']+1;
    }
    else
    {
        $_SESSION['count']=1;
    }
    echo "Page Accessed ".$_SESSION['count'];
    ?>
