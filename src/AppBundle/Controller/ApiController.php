<?php

namespace AppBundle\Controller;

use AppBundle\Exception\Product\NotFoundException as ProductNotFoundException;
use AppBundle\Exception\Store\NotFoundException as StoreNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Api Controller
 *
 * @package AppBundle\Controller
 */
class ApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function stockListAction()
    {
        try {
            $storeService = $this->get('app.store.service');
            $storesPresenter = $storeService->getAllApi();

            return new JsonResponse($storesPresenter->toArrayApi());
        } catch (\Exception $e) {
            throw new HttpException(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $e->getMessage()
            );
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function stockShowAction(int $id)
    {
        try {
            $storeService = $this->get('app.store.service');
            $storePresenter = $storeService->getApi($id);

            return new JsonResponse($storePresenter->toArrayApi());
        } catch (StoreNotFoundException $e) {
            throw new HttpException(
                Response::HTTP_NOT_FOUND,
                $e->getMessage()
            );
        } catch (\Exception $e) {
            throw new HttpException(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $e->getMessage()
            );
        }
    }

    /**
     * @return JsonResponse
     */
    public function productListAction()
    {
        try {
            $productService = $this->get('app.product.service');
            $productsPresenter = $productService->getAllApi();

            return new JsonResponse($productsPresenter->toArrayApi());
        } catch (\Exception $e) {
            throw new HttpException(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $e->getMessage()
            );
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function productShowAction(int $id)
    {
        try {
            $productService = $this->get('app.product.service');
            $productPresenter = $productService->getApi($id);

            return new JsonResponse($productPresenter->toArrayApi());

        } catch (ProductNotFoundException $e) {
            throw new HttpException(
                Response::HTTP_NOT_FOUND,
                $e->getMessage()
            );
        } catch (\Exception $e) {
            throw new HttpException(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                $e->getMessage()
            );
        }
    }
}
