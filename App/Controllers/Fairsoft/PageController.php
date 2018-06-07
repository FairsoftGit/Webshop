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
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/index.html');
    }

    public function contactAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/contact.html');
    }

    public function fairAppAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairApp.html');
    }

    public function fairBoxAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairBox.html');
    }

    public function fairDataAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairData.html');
    }

    public function fairGogglesAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairGoggles.html');
    }

    public function fairPayPlanAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairPayPlan.html');
    }

    public function fairRentAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairRent.html');
    }

    public function fairVestAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/fairVest.html');
    }

    public function faqAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/faq.html');
    }

    public function howItWorksAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/howItWorks.html');
    }

    public function orderAndDeliveryAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/orderAndDelivery.html');
    }

    public function paymentsAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/payments.html');
    }

    public function sitemapAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/sitemap.html');
    }

    public function techSupportAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/techSupport.html');
    }

    public function termsAction()
    {
        View::renderTemplate('Fairsoft/Page/' . $this->route_params["language"] . '/terms.html');
    }
}
