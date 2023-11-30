package univ.iwa.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import univ.iwa.model.Filiere;

@Repository
public interface FiliereRepository extends JpaRepository<Filiere, Long>{

}
