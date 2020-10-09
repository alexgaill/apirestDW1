<?php

require "General.php";
use OpenApi\Annotations as OA;

class Categorie extends General{

    protected $table = __CLASS__;

    /**
     * @OA\Get(
     *      path="/categorie",
     *      @OA\Response(
     *          response="200",
     *          description="Récupère toutes les catégories",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/CategorieEntity")
     *          ),
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Une erreur est survenue dans l'url",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Impossible de récupérer les données"
     *              )
     *          )
     *      ),
     *      @OA\Parameter(name="limit",
     *                      in="query",
     *                      description="Limite le nombre de catégorie pour une pagination",
     *                      required=false,
     *                      @OA\Schema(type="integer")
     *      )
     * )
     */

    /**
     * @OA\Get(
     *      path="/categorie/{id}",
     *      @OA\Response(
     *          response="200",
     *          description="Récupère toutes les catégories",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/CategorieEntity"),
     *              @OA\Property(type="string",
     *                  format="date-time"
     *              )
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Id de la catégorie à récupérer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      )
     * )
     */

    /**
     * @OA\Post(
     *      path="/categorie",
     *      @OA\Response(
     *          response="200",
     *          description="Enregistrement ok",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Les données sont bien sauvegardées"
     *              )
     *          )
     *      ),
     *      @OA\RequestBody(
     *          request="save",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Items(ref="#/components/schemas/CategorieEntity"),
     *              required={"name"}
     *          )
     *      )
     * )
     */
}
