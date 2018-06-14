<?php

namespace App\Controllers\Fairsoft;

use \Core\View;

/**
 * PageController
 *
 * PHP version 7.0
 */
class PageController extends \Core\Controller
{
    /**
     * Before filter. Return false to stop the action from executing.
     *
     * @return void
     */
    protected function before()
    {
    }

    public function aboutUsAction()
    {
        View::renderTemplate('Fairsoft/Page/index.html');
    }

    public function contactAction()
    {
        View::renderTemplate('Fairsoft/Page/contact.html');
    }

    public function fairAppAction()
    {
        View::renderTemplate('Fairsoft/Page/fairApp.html');
    }

    public function fairBoxAction()
    {
        View::renderTemplate('Fairsoft/Page/fairBox.html');
    }

    public function fairDataAction()
    {
        View::renderTemplate('Fairsoft/Page/fairData.html');
    }

    public function fairGogglesAction()
    {
        View::renderTemplate('Fairsoft/Page/fairGoggles.html');
    }

    public function fairPayPlanAction()
    {
        View::renderTemplate('Fairsoft/Page/fairPayPlan.html');
    }

    public function fairRentAction()
    {
        View::renderTemplate('Fairsoft/Page/fairRent.html');
    }

    public function fairVestAction()
    {
        View::renderTemplate('Fairsoft/Page/fairVest.html');
    }

    public function faqAction()
    {
        View::renderTemplate('Fairsoft/Page/faq.html');
    }

    public function howItWorksAction()
    {
        View::renderTemplate('Fairsoft/Page/howItWorks.html');
    }

    public function orderAndDeliveryAction()
    {
        View::renderTemplate('Fairsoft/Page/orderAndDelivery.html');
    }

    public function paymentsAction()
    {
        View::renderTemplate('Fairsoft/Page/payments.html');
    }

    public function sitemapAction()
    {
        View::renderTemplate('Fairsoft/Page/sitemap.html');
    }

    public function techSupportAction()
    {
        View::renderTemplate('Fairsoft/Page/techSupport.html');
    }

    public function termsAction()
    {
        View::renderTemplate('Fairsoft/Page/terms.html');
    }
}
