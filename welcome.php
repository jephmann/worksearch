<?php    
    $page = array(
        'title'     => "Session",
        'subtitle'  => " > Welcome",
        'path'      => NULL,
        'mode'      => "Welcome",
    );
    require ($page['path'].'_include/first.php');
    user_session($page['path']);
    require ($page['path'].'_classes/all.php');
    require ($page['path'].'_functions/all.php');
    $objStatus = new Status;
    $objStatus->setClass("status_quo");
    // =========================================================================
    

    
    /*
     * =========================================================================
     */
    require_once ($page['path'].'_views/head.php');
    require_once ($page['path'].'_views/header.php');
    require_once ($page['path'].'_views/aside.php');
?>
<fieldset>
    <legend>WELCOME!</legend>
        <div class="contents">
            <span>
                <a href="profile/">Profile</a>
            </span>
            <p>
                Quite simply: Who are you?
            </p>            
        </div>
        <div class="contents">
            <span>
                <a href="companies/">Companies</a>
            </span>
            <p>
                These are the addresses of your prospects
                -- companies with which you interviewed, companies where you
                might like to work, recruiting firms, etc.
                [I might actually rename this section "Prospects".]
            </p>
            <div class="clear"></div>
        </div>
        <div class="contents">
            <span>
                <a href="contacts/">Contacts</a>
            </span>
            <p>
                These are the people whom you would contact or people who
                initiated contact with you.
                -- recruiters, H.R., maybe even CEOs.
            </p>            
        </div>
        <div class="contents">
            <span>
                <a href="logs/">Logs</a>
            </span>
            <p>
                This is the actual activity which you had with your contacts,
                beyond merely adding them into the system.
                Here you would log actual conversations, meetings, interviews
                and so on.
                This section is partially modeled after the IDES Worksearch
                forms, from which this project "borrows" its working title.
                To be added: creating a PDF of weekly or bi-weekly log reports.
            </p>            
        </div>
        <div class="contents">
            <span>
                Mail
            </span>
            <p>
                To be built.
                Compose emails, upload form-letter templates and revise them,
                prepare a targeted mass e-mail campaign.
            </p>            
        </div>
        <div class="contents">
            <span>
                Documents
            </span>
            <p>
                To be built.
                A provision for resumes, cover letters and form-letter
                templates.
            </p>            
        </div>
        <div class="contents">
            <span>
                Networking
            </span>
            <p>
                To be built.
                A diary of sorts regarding networking events you may have
                attended, including job fairs, MeetUps and the like, wherein you
                might meet several people in one place.
                Although logs such as the IDES Worksearch forms do not easily
                accommodate such information, any networking activity should
                count as a credit toward your diligence in seeking work.
            </p>            
        </div>
</fieldset>
<?php    
    require_once ($page['path'].'_views/footer.php');
?>
