<?php

/**
 * @OA\Schema()
 */
class CategorieEntity {

    /**
     * @OA\Property(
     *      type="integer"
     * )
     *
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *      type="string",
     *      nullable=true
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *      type="string",
     *      format="date-time"
     * )
     *
     * @var \DateTime
     */
    private $createdAt;
}