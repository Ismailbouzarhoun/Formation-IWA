package univ.iwa.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import univ.iwa.model.Person;

@Repository
public interface PersonRepository extends JpaRepository<Person, Long>{
	
}
