 <?php if($userAdmin): ?>
    <li class="fixed-row"><a class="item ">Administratiepaneel</a></li>

    <li class="fixed-row"><a class="item"> Statistieken</a></li>

    <li><a href="<?php echo e(url('admin/statistics/reservations')); ?>" ><i class="material-icons notranslate">insert_chart</i> Reserveringen</a></li>
    <li><a href="<?php echo e(url('admin/statistics/search')); ?>" ><i class="material-icons notranslate">search</i> Zoekwoorden</a></li>

    <li class="fixed-row"><a class="item "> Algemeen</a></li>
    <li><a href="<?php echo e(url('admin/translations')); ?>" ><i class="material-icons notranslate">flag</i> Talen</a></li>
    <li><a href="<?php echo e(url('admin/affiliates')); ?>" ><i class="material-icons notranslate">account_balance_wallet</i> Affiliaties</a></li>
    <li><a href="<?php echo e(url('admin/companies')); ?>" ><i class="material-icons notranslate">store_mall_directory</i> Bedrijven</a></li>
    <li><a href="<?php echo e(url('admin/companies/callcenter')); ?>" ><i class="material-iconsnotranslate">phone</i> Bellijst</a></li>
    <li><a href="<?php echo e(url('admin/users')); ?>" ><i class="material-icons notranslate">supervisor_account</i> Gebruikers</a></li>
    <li><a href="<?php echo e(url('admin/bans')); ?>" ><i class="material-icons notranslate">signal_cellular_no_sim</i> Waarschuwingen</a></li>
    <li><a href="<?php echo e(url('admin/roles')); ?>" ><i class="material-icons notranslate">dvr</i> Rollen</a></li>
    <li><a href="<?php echo e(url('admin/barcodes')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Barcodes</a></li>
    <li><a href="<?php echo e(url('admin/giftcards')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Giftcards</a></li>
    <li><a href="<?php echo e(url('admin/tables')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Tafelbeheer</a></li>
    <li><a href="<?php echo e(url('admin/services')); ?>" ><i class="material-icons notranslate">room_service</i> Diensten</a></li>
    <li><a href="<?php echo e(url('admin/preferences')); ?>" ><i class="material-icons notranslate">assignment_turned_in</i> Voorkeuren</a></li>
    <li><a href="<?php echo e(url('admin/reviews')); ?>" ><i class="material-icons notranslate">plus_one</i> Recensies</a></li>
    <li><a href="<?php echo e(url('admin/widgets')); ?>" ><i class="material-icons notranslate">pages</i> Widgets</a></li>
    <li><a href="<?php echo e(url('admin/contact')); ?>" ><i class="material-icons notranslate">phone</i> Contact Formulier Lijst</a></li>
    <li><a href="<?php echo e(url('admin/unwanted')); ?>" ><i class="material-icons notranslate">remove</i> Ongewenste Woord</a></li>

    <li class="fixed-row"><a class="item "> Reserveringen</a></li>
    <li><a href="<?php echo e(url('admin/reservations/clients')); ?>"><i class="material-icons notranslate">restaurant</i> Bedrijven</a></li>
    <li><a href="<?php echo e(url('admin/reservations/emails')); ?>"><i class="material-icons notranslate">mail_outline</i> E-mails</a></li>
    <li><a href="<?php echo e(url('admin/reservations-options')); ?>"><i class="material-icons notranslate">event_note</i> Aanbiedingen</a></li>

    <li class="fixed-row"><a class="item "> Financieel</a></li>

    <li><a href="<?php echo e(url('admin/reservations/saldo')); ?>" ><i class="material-icons notranslate">keyboard</i> Financieel</a></li>
    <li><a href="<?php echo e(url('admin/invoices')); ?>" ><i class="material-icons notranslate">border_color</i> Facturen</a></li>
    <li><a href="<?php echo e(url('admin/incassos')); ?>" ><i class="material-icons notranslate">event_note</i> Incasso</a></li>
    <li><a href="<?php echo e(url('admin/transactions')); ?>" > <i class="material-icons notranslate">local_atm</i> Transacties</a></li>
    <li><a href="<?php echo e(url('admin/payments')); ?>" ><i class="material-icons notranslate">attach_money</i> Betalingen</a></li>
    <li><a href="<?php echo e(url('admin/all-future-deals')); ?>" ><i class="material-icons notranslate">face</i> Vouchers </a></li>

    <li class="fixed-row"><a class="item "> Website</a></li>

    <li><a href="<?php echo e(url('admin/settings')); ?>" ><i class="material-icons notranslate">settings</i> Instellingen</a></li>
    <li><a href="<?php echo e(url('admin/newsletter')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Nieuwsbrief</a></li>
    <li><a href="<?php echo e(url('admin/appointments')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Afspraken</a></li>
    <li><a href="<?php echo e(url('admin/notifications')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Notificaties</a></li>
    <li><a href="<?php echo e(url('admin/notifications/groups')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Notificatie groepn</a></li>
    <li><a href="<?php echo e(url('admin/news')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Nieuwsberichten</a></li>
    <li><a href="<?php echo e(url('admin/pages')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Pagina's</a></li>
    <li><a href="<?php echo e(url('admin/contents')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Tekstblokken</a></li>
    <li><a href="<?php echo e(url('admin/faq')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Veelgestelde vragen</a></li>
    <li><a href="<?php echo e(url('admin/mailtemplates')); ?>" ><i class="material-icons notranslate">crop_landscape</i> Meldingen</a></li>
<?php endif; ?>