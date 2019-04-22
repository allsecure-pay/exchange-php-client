<?php


namespace Exchange\Client\Transaction\Base;

/**
 * Interface OffsiteInterface
 * @package Exchange\Client\Transaction
 */
interface OffsiteInterface {

    /**
     * @return string
     */
    public function getDescription();

    /**
     * description of your transaction (e.g. purchased goods etc.)
     *
     * @param string $description
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getSuccessUrl();

    /**
     * the url to which Exchange redirects after a successful transaction
     *
     * @param string $successUrl
     */
    public function setSuccessUrl($successUrl);

    /**
     * @return string
     */
    public function getCancelUrl();

    /**
     * the url to which Exchange redirects after a cancelled transaction
     *
     * @param string $cancelUrl
     */
    public function setCancelUrl($cancelUrl);

    /**
     * @return string
     */
    public function getErrorUrl();

    /**
     * the url to which Exchange redirects after a failed transaction
     *
     * @param string $errorUrl
     */
    public function setErrorUrl($errorUrl);

    /**
     * @return string
     */
    public function getCallbackUrl();

    /**
     * the url to which Exchange sends the Callback notification
     *
     * @param string $callbackUrl
     */
    public function setCallbackUrl($callbackUrl);
}