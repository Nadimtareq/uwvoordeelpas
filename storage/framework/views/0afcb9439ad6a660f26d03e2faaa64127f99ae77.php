<?php $__env->startSection('content'); ?>

    <div class="content">
        <?php echo $__env->make('admin.template.breadcrumb', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="ui grid">
            <div class="sixteen wide mobile four wide computer column">
                <div class="ui normal floating basic search selection dropdown">
                    <input type="hidden" name="source" value="<?php echo e(Request::input('source')); ?>">

                    <div class="text">Partij</div>
                    <i class="dropdown icon"></i>

                    <div class="menu">
                        <a href="<?php echo e(url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'seatme')))); ?>" data-value="seatme" class="item">SeatMe</a>
                        <a href="<?php echo e(url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'eetnu')))); ?>" data-value="eetnu" class="item">EetNU</a>
                        <a href="<?php echo e(url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'couverts')))); ?>" data-value="couverts" class="item">Couverts</a>
                        <a href="<?php echo e(url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', 'wifi')))); ?>" data-value="wifi" class="item">Wi-Fi</a>

                        <?php if(count($sources) >= 1): ?>
                            <?php foreach($sources as $source): ?>
                                <a href="<?php echo e(url('admin/statistics/reservations?'.http_build_query(array_add($queryString, 'source', str_slug($source))))); ?>" data-value="<?php echo e($source); ?>" class="item"><?php echo e($source); ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="sixteen wide mobile ten wide computer column">
                <?php echo Form::open(array('method' => 'get')) ?>

                <div class="ui input">
                    <?php
                    echo Form::text(
                        'from',
                        '',
                        array(
                            'class' => 'datepicker_no_min_date',
                            'placeholder' => 'Startdatum'
                        )
                    );
                    ?>
                </div>

                <div class="ui input">
                    <?php
                    echo Form::text(
                        'to',
                        '',
                        array(
                            'class' => 'datepicker_no_min_date',
                            'placeholder' => 'Einddatum'
                        )
                    );
                    ?>
                </div>

                <button class="ui button" type="submit"><i class="search icon"></i></button>
                <?php echo Form::close(); ?>

            </div>
        </div>

        <div class="ui statistics">
            <div class="statistic">
                <div class="value">
                    <?php /*<?php echo e($topStatistics->topUsers); ?>*/ ?>
                    <?php echo e(count(\App\User::all())); ?>

                </div>

                <div class="label">
                    gebruikers
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <?php /*<?php echo e($topStatistics->topCompanies); ?>*/ ?>
                    <?php echo e(count(\App\Models\Company::all())); ?>

                </div>

                <div class="label">
                    bedrijven
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <?php /*<?php echo e($topStatistics->topAffiliate); ?>*/ ?>
                    <?php echo e(count(\App\Models\Affiliate::all())); ?>

                </div>

                <div class="label">
                    affiliaties
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <?php /*<?php echo e($topStatistics->topTransactions); ?>*/ ?>
                    <?php echo e($totalTransactions); ?>

                </div>

                <div class="label">
                    transacties
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <?php /*<?php echo e($topStatistics->topReservations); ?>*/ ?>
                    <?php echo e($totalReservation); ?>

                </div>

                <div class="label">
                    reserveringen
                </div>
            </div>
        </div><br><br>

        <div class="ui grid">
            <div class="row">
                <div class="four wide column">
                    <div class="ui red segment">
                        <strong class=>Top reservering: dagen</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Dag</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topDays) >= 1): ?>
                                <?php foreach($topDays as $topDay): ?>
                                    <tr>
                                        <td><?php echo e($dayName[$topDay->nameRow + 1]); ?></td>
                                        <td><?php echo e($topDay->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui blue segment">
                        <strong class=>Top reservering: tijden</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Tijd</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topTimes) >= 1): ?>
                                <?php foreach($topTimes as $topTime): ?>
                                    <tr>
                                        <td><?php echo e(date('H:i', strtotime($topTime->nameRow))); ?></td>
                                        <td><?php echo e($topTime->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui yellow segment">
                        <strong class=>Top reservering: personen</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Aantal personen</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topPersons) >= 1): ?>
                                <?php foreach($topPersons as $topPerson): ?>
                                    <tr>
                                        <td><?php echo e($topPerson->nameRow); ?> <?php echo e($topPerson->nameRow == 1 ? 'persoon' : 'personen'); ?></td>
                                        <td><?php echo e($topPerson->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui red segment">
                        <strong>Reserveringen: Spaartegoed</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Spaartegoed</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Wel spaartegoed</td>
                                <td>reservationSaldo</td>
                                <?php /*<td><?php echo e($topStatistics->reservationsSaldo); ?>x</td>*/ ?>
                            </tr>
                            <tr>
                                <td>Geen spaartegoed</td>
                                <td>reservations</td>
                                <?php /*<td><?php echo e($topStatistics->reservationsWithoutSaldo); ?>x</td>*/ ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="four wide column">
                    <div class="ui red segment">
                        <strong class=>Top reservering: bedrijven</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Bedrijf</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topCompanies) >= 1): ?>
                                <?php foreach($topCompanies as $topCompany): ?>
                                    <tr>
                                        <td><?php echo e($topCompany->nameRow); ?></td>
                                        <td><?php echo e($topCompany->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui red segment">
                        <strong class=>Top kliks: bedrijven</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Bedrijf</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topClicksCompanies) >= 1): ?>
                                <?php foreach($topClicksCompanies as $topClicksCompany): ?>
                                    <tr>
                                        <td><?php echo e($topClicksCompany->nameRow); ?></td>
                                        <td><?php echo e($topClicksCompany->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui red segment">
                        <strong class=>Top kliks: FAQ</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Vraag</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topClicksFaqs) >= 1): ?>
                                <?php foreach($topClicksFaqs as $topClicksFaq): ?>
                                    <tr>
                                        <td><?php echo e($topClicksFaq->nameRow); ?></td>
                                        <td><?php echo e($topClicksFaq->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui red segment">
                        <strong class=>Top kliks: affiliaties</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Webshop</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topClicksAffiliates) >= 1): ?>
                                <?php foreach($topClicksAffiliates as $topClicksAffiliate): ?>
                                    <tr>
                                        <td><?php echo e($topClicksAffiliate->nameRow); ?></td>
                                        <td><?php echo e($topClicksAffiliate->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="four wide column">
                    <div class="ui red segment">
                        <strong class=>Top kliks: voorkeuren</strong><br>
                        <div class="ui divider"></div>

                        <table class="ui very basic  celled table">
                            <thead>
                            <tr>
                                <th>Voorkeur</th>
                                <th>Aantal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($topClicksPreferences) >= 1): ?>
                                <?php foreach($topClicksPreferences as $topClicksPreference): ?>
                                    <tr>
                                        <td><?php echo e($topClicksPreference->nameRow); ?></td>
                                        <td><?php echo e($topClicksPreference->countRow); ?>x</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.theme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>