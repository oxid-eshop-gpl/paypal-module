<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ProjectServiceContainer extends Container
{
    private $parameters = [];
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->normalizedIds = [
            'oxidesales\\eshopcommunity\\internal\\common\\database\\querybuilderfactoryinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface',
            'oxidesales\\eshopcommunity\\internal\\form\\contactform\\contactformbridgeinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Form\\ContactForm\\ContactFormBridgeInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\bridge\\productratingbridgeinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\ProductRatingBridgeInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\bridge\\userratingbridgeinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserRatingBridgeInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\bridge\\userreviewandratingbridgeinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserReviewAndRatingBridgeInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\bridge\\userreviewbridgeinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserReviewBridgeInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\dao\\ratingdaointerface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\service\\userratingserviceinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface',
            'oxidesales\\eshopcommunity\\internal\\review\\service\\userreviewserviceinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface',
            'oxidesales\\eshopcommunity\\internal\\utility\\contextinterface' => 'OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface',
            'psr\\log\\loggerinterface' => 'Psr\\Log\\LoggerInterface',
        ];
        $this->methodMap = [
            'OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface' => 'getQueryBuilderFactoryInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Form\\ContactForm\\ContactFormBridgeInterface' => 'getContactFormBridgeInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\ProductRatingBridgeInterface' => 'getProductRatingBridgeInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserRatingBridgeInterface' => 'getUserRatingBridgeInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserReviewAndRatingBridgeInterface' => 'getUserReviewAndRatingBridgeInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserReviewBridgeInterface' => 'getUserReviewBridgeInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface' => 'getRatingDaoInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface' => 'getUserRatingServiceInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface' => 'getUserReviewServiceInterfaceService',
            'OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface' => 'getContextInterfaceService',
            'Psr\\Log\\LoggerInterface' => 'getLoggerInterfaceService',
            'form.contact_form.contact_form_configuration' => 'getForm_ContactForm_ContactFormConfigurationService',
        ];
        $this->privates = [
            'OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface' => true,
            'form.contact_form.contact_form_configuration' => true,
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'Doctrine\\DBAL\\Connection' => true,
            'Monolog\\Logger' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Adapter\\ShopAdapterInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Common\\Form\\FormBuilderInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Form\\ContactForm\\ContactFormMessageBuilderInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Logger\\Validator\\Configuration\\MonologConfigurationInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Logger\\Validator\\LoggerConfigurationValidatorInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Logger\\Validator\\LoggerFactoryInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\ProductRatingDaoInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\ReviewDaoInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\ProductRatingServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\RatingCalculatorServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\ReviewAndRatingMergingServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewAndRatingServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface' => true,
            'OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface' => true,
            'OxidEsales\\Eshop\\Core\\Config' => true,
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'common.form.required_fields_validator' => true,
            'form.contact_form.contact_form_configuration' => true,
            'form.contact_form.contact_form_configuration_factory' => true,
            'form.contact_form.contact_form_email_validator' => true,
            'form.contact_form.contact_form_factory' => true,
            'form.contact_form.contact_form_fields_configuration_data_provider' => true,
            'oxid_esales.review.product_rating_mapper' => true,
            'oxid_esales.review.rating_mapper' => true,
            'oxid_esales.review.review_mapper' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormBridgeInterface' shared service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormBridge
     */
    protected function getContactFormBridgeInterfaceService()
    {
        $a = ${($_ = isset($this->services['form.contact_form.contact_form_configuration']) ? $this->services['form.contact_form.contact_form_configuration'] : $this->getForm_ContactForm_ContactFormConfigurationService()) && false ?: '_'};
        $b = new \OxidEsales\EshopCommunity\Internal\Adapter\ShopAdapter();

        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Form\\ContactForm\\ContactFormBridgeInterface'] = new \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormBridge(new \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormFactory($a, new \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormEmailValidator($b), new \OxidEsales\EshopCommunity\Internal\Common\Form\RequiredFieldsValidator()), new \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormMessageBuilder($b), $a);
    }

    /**
     * Gets the public 'OxidEsales\EshopCommunity\Internal\Review\Bridge\ProductRatingBridgeInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Bridge\ProductRatingBridge
     */
    protected function getProductRatingBridgeInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\ProductRatingBridgeInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Bridge\ProductRatingBridge(new \OxidEsales\EshopCommunity\Internal\Review\Service\ProductRatingService(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface'] : $this->getRatingDaoInterfaceService()) && false ?: '_'}, new \OxidEsales\EshopCommunity\Internal\Review\Dao\ProductRatingDao(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface'] : $this->getQueryBuilderFactoryInterfaceService()) && false ?: '_'}, new \OxidEsales\EshopCommunity\Internal\Review\DataMapper\ProductRatingDataMapper()), new \OxidEsales\EshopCommunity\Internal\Review\Service\RatingCalculatorService()));
    }

    /**
     * Gets the public 'OxidEsales\EshopCommunity\Internal\Review\Bridge\UserRatingBridgeInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Bridge\UserRatingBridge
     */
    protected function getUserRatingBridgeInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserRatingBridgeInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Bridge\UserRatingBridge(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface'] : $this->getUserRatingServiceInterfaceService()) && false ?: '_'});
    }

    /**
     * Gets the public 'OxidEsales\EshopCommunity\Internal\Review\Bridge\UserReviewAndRatingBridgeInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Bridge\UserReviewAndRatingBridge
     */
    protected function getUserReviewAndRatingBridgeInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserReviewAndRatingBridgeInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Bridge\UserReviewAndRatingBridge(new \OxidEsales\EshopCommunity\Internal\Review\Service\UserReviewAndRatingService(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface'] : $this->getUserReviewServiceInterfaceService()) && false ?: '_'}, ${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface'] : $this->getUserRatingServiceInterfaceService()) && false ?: '_'}, new \OxidEsales\EshopCommunity\Internal\Review\Service\ReviewAndRatingMergingService()));
    }

    /**
     * Gets the public 'OxidEsales\EshopCommunity\Internal\Review\Bridge\UserReviewBridgeInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Bridge\UserReviewBridge
     */
    protected function getUserReviewBridgeInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Bridge\\UserReviewBridgeInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Bridge\UserReviewBridge(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface'] : $this->getUserReviewServiceInterfaceService()) && false ?: '_'});
    }

    /**
     * Gets the public 'Psr\Log\LoggerInterface' shared service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Logger\Wrapper\LoggerWrapper
     */
    protected function getLoggerInterfaceService()
    {
        return $this->services['Psr\\Log\\LoggerInterface'] = new \OxidEsales\EshopCommunity\Internal\Logger\Wrapper\LoggerWrapper((new \OxidEsales\EshopCommunity\Internal\Logger\Factory\MonologLoggerFactory(new \OxidEsales\EshopCommunity\Internal\Logger\Configuration\MonologConfiguration('OXID Logger', ${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface'] : $this->getContextInterfaceService()) && false ?: '_'}), new \OxidEsales\EshopCommunity\Internal\Logger\Validator\PsrLoggerConfigurationValidator()))->create());
    }

    /**
     * Gets the private 'OxidEsales\EshopCommunity\Internal\Common\Database\QueryBuilderFactoryInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Common\Database\QueryBuilderFactory
     */
    protected function getQueryBuilderFactoryInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface'] = new \OxidEsales\EshopCommunity\Internal\Common\Database\QueryBuilderFactory(\OxidEsales\EshopCommunity\Internal\Common\Factory\ConnectionFactory::get());
    }

    /**
     * Gets the private 'OxidEsales\EshopCommunity\Internal\Review\Dao\RatingDaoInterface' shared service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Dao\RatingDao
     */
    protected function getRatingDaoInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Dao\RatingDao(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface'] : $this->getQueryBuilderFactoryInterfaceService()) && false ?: '_'}, new \OxidEsales\EshopCommunity\Internal\Review\DataMapper\RatingDataMapper());
    }

    /**
     * Gets the private 'OxidEsales\EshopCommunity\Internal\Review\Service\UserRatingServiceInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Service\UserRatingService
     */
    protected function getUserRatingServiceInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserRatingServiceInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Service\UserRatingService(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Dao\\RatingDaoInterface'] : $this->getRatingDaoInterfaceService()) && false ?: '_'});
    }

    /**
     * Gets the private 'OxidEsales\EshopCommunity\Internal\Review\Service\UserReviewServiceInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Review\Service\UserReviewService
     */
    protected function getUserReviewServiceInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Review\\Service\\UserReviewServiceInterface'] = new \OxidEsales\EshopCommunity\Internal\Review\Service\UserReviewService(new \OxidEsales\EshopCommunity\Internal\Review\Dao\ReviewDao(${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Common\\Database\\QueryBuilderFactoryInterface'] : $this->getQueryBuilderFactoryInterfaceService()) && false ?: '_'}, new \OxidEsales\EshopCommunity\Internal\Review\DataMapper\ReviewDataMapper()));
    }

    /**
     * Gets the private 'OxidEsales\EshopCommunity\Internal\Utility\ContextInterface' shared autowired service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Utility\Context
     */
    protected function getContextInterfaceService()
    {
        return $this->services['OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface'] = new \OxidEsales\EshopCommunity\Internal\Utility\Context(\OxidEsales\Eshop\Core\Registry::getConfig());
    }

    /**
     * Gets the private 'form.contact_form.contact_form_configuration' shared service.
     *
     * @return \OxidEsales\EshopCommunity\Internal\Common\FormConfiguration\FormConfiguration
     */
    protected function getForm_ContactForm_ContactFormConfigurationService()
    {
        return $this->services['form.contact_form.contact_form_configuration'] = (new \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormConfigurationFactory(new \OxidEsales\EshopCommunity\Internal\Form\ContactForm\ContactFormFieldsConfigurationDataProvider(), ${($_ = isset($this->services['OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface']) ? $this->services['OxidEsales\\EshopCommunity\\Internal\\Utility\\ContextInterface'] : $this->getContextInterfaceService()) && false ?: '_'}))->getFormConfiguration();
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    private $normalizedParameterNames = [];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'utility_path' => 'OxidEsales\\EshopCommunity\\Internal\\Utility',
            'logger_path' => 'OxidEsales\\EshopCommunity\\Internal\\Logger',
            'review_path' => 'OxidEsales\\EshopCommunity\\Internal\\Review',
        ];
    }
}
